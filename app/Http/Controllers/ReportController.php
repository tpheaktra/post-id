<?php

namespace App\Http\Controllers;
use App\model\GeneralInformationModel;
use DB;
use auth;
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpWord;
use Excel;
use Carbon\Carbon;
use PHPExcel_Style_Border;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $excel;
    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->excel = $excel;
    }

    public function index(){
        return view('report.report-index');
    }

    /*
     * generate
     * member family interview
     */

    public function pirntInterviewResult($id){
        $id = Crypt::decrypt($id);

        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = new \PhpOffice\PhpWord\TemplateProcessor('template/Post_ID_result_printing_form.docx');

        $gInfo             = GeneralInformationModel::with('score','hospital','provinces','district','commune','village','shpHouseholds')->findOrFail($id);

        $memberFamily = DB::select("select mf.nick_name,g.name_kh as sex,mf.dob,mf.age,fr.name_kh as relation from member_family mf 
                                    inner join gender g on mf.gender_id = g.id
                                    inner join relationship fr on mf.family_relationship_id = fr.id
                                    where mf.g_information_id = '$id'");
        $address = 'ភូមិ '.$gInfo['village']->name_kh.' ឃុំ/សង្កាត់ '.$gInfo['commune']->name_kh.' ស្រុក/ខណ្ឌ '.$gInfo['district']->name_kh.' ខេត្ត/ក្រុង '.$gInfo['provinces']->name_kh;

        $template->setValue('interview_date',$gInfo->interview_date);     
        $template->setValue('expire_date',$gInfo->expire_date);
        $template->setValue('hospital',$gInfo->hospital->name_kh);
        $template->setValue('interview_code',$gInfo->interview_code);
        $template->setValue('address',$address);
        $template->setValue('location',$gInfo->g_local_village);
        $template->setValue('hhid',$gInfo->printcardno);
        $template->setValue('score',$gInfo->score->total);
        $template->setValue('p',$gInfo->shpHouseholds->poorcategory);   

      

        if($gInfo->score->total < 42){
            $template->setValue('txt','មិនជាប់គ្រួសារក្រីក្រ');
        }elseif(($gInfo->score->total >= 42) && ($gInfo->score->total <= 58)){
            $template->setValue('txt','កំរិតក្រីក្រ២​ ឬ​ ងាយរងគ្រោះ');
        }elseif($gInfo->score->total > 58){
            $template->setValue('txt','កំរិតក្រីក្រ១'); 
        }

        for($i=0;$i<=8;$i++) {
            foreach ($memberFamily as $key => $v) {
                if($i == $key) {
                    $template->setValue('key_' . $i, ($i + 1));
                    $template->setValue('member_family_' . $key, $v->nick_name);
                    $template->setValue('sex_' . $key, $v->sex);
                    $template->setValue('dob_' . $key, $v->dob);
                    $template->setValue('age_' . $key, $v->age);
                    $template->setValue('relation_' . $key, $v->relation);
                }
            }
            $template->setValue('key_' . $i, '');
            $template->setValue('member_family_' . $i, '');
            $template->setValue('sex_' . $i, '');
            $template->setValue('dob_' . $i, '');
            $template->setValue('age_' . $i, '');
            $template->setValue('relation_' . $i, '');
        }

        $name = 'member_family_interview.docx';
        //echo date('H:i:s'), " Write to Word2007 format", PHP_EOL;
        $template->saveAs($name);
        $file=  "{$name}";
        $headers = array(
            'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );
        ob_end_clean();
        return response()->download($file, $name, $headers);
        exit();
    }


    /*
     * generate
     * report by month
     */
    function reportBymonth($year){

        $memberFamily = GeneralInformationModel::with('generate_report_by_month','health_facilities')
            ->select('id',DB::raw("COUNT(*) AS num"),'hf_code','g_province_id',DB::raw("year(interview_date) as  `year`"),DB::raw("month(interview_date) as `month`"))
            ->where(DB::raw("YEAR(interview_date)"),$year)
            ->where('record_status',1)
            ->groupBy('hf_code',DB::raw("MONTH(interview_date)"),DB::raw("YEAR(interview_date)"))
            ->orderBy('hf_code',DB::raw("year"),DB::raw("month"))
            ->get();

        $tmp_data = [];
        if(!empty($memberFamily)){
            foreach ($memberFamily as $i => $v){
                if(empty($v->hf_code)){continue;}
                $tmp_data[$v->hf_code]['province'] = $v->generate_report_by_month->name_kh;
                $tmp_data[$v->hf_code]['hf_name']  = $v->health_facilities->name_kh ;
                $tmp_data[$v->hf_code]['datas'][$v->year][$v->month] = $v->num;
            }
        }
       // echo json_encode($tmp_data);exit();
        return $tmp_data;
    }

    public function generateReportByYear(request $request){
        $this->validate($request, [
            'year' => 'required',
        ]);
        $year  = $request->year;
        if($request->report == 1) {
            $memberFamily = $this->reportBymonth($year);
            if (empty($memberFamily)) {
                return Redirect::back()->with('danger', 'មិនមានទិន្ន័យសំភាសអ្នកជំងឺទេ');
                //  die('No Data');
            }
            //dd($memberFamily);
            $excel = Excel::load(public_path('template/Post_ID_Report_Format.xlsx'));
            $sheet = $excel->setActiveSheetIndex(0);
            $sheet->setCellValue('B1', $year);
            $r = 5;
            foreach ($memberFamily as $i => $fac) {
                foreach ($fac['datas'] as $y => $months) {
                    $c = "A";
                    $tt = 0;
                    $sheet->setCellValue(($c++) . $r, $r - 4);
                    $sheet->setCellValue(($c++) . $r, $fac['province']);
                    $sheet->setCellValue(($c++) . $r, $fac['hf_name']);
                    $sheet->setCellValue(($c++) . $r, $y);
                    for ($k = 1; $k <= 12; $k++) {
                        $mval = isset($months[$k]) ? $months[$k] : 0;
                        $sheet->setCellValue(($c++) . $r, $mval);
                        $tt += $mval;
                    }
                    $sheet->setCellValue(($c++) . $r, $tt);
                    $r++;
                }
            }
            $sheet->getStyle('A5:Q' . ($r - 1))
                ->getBorders()->getAllBorders()
                ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $excel->download('xlsx');
            exit();
        }else{
            $memberFamily = DB::select('select gi.interview_date,
                            gi.id,
                            gi.printcardno,
                            gi.g_patient,
                            g.name_en,
                            gi.g_age,
                            sum(if(mf.gender_id=1,1,0)) as male,
                            sum(if(mf.gender_id=2,1,0)) as female,
                            (sum(if(mf.gender_id=1,1,0)) + sum(if(mf.gender_id=2,1,0))) as totalFM
                         from general_information gi 
                         inner join gender g on gi.g_sex = g.id
                         inner join member_family mf on gi.id = mf.g_information_id
                         group by mf.g_information_id');


            //dd($memberFamily);
            $excel = Excel::load(public_path('template/Register-Book.xlsx'));
            $sheet = $excel->setActiveSheetIndex(0);
           // $sheet->setCellValue('B1', $year);
            $i = 5;
            foreach ($memberFamily as $fac) {
                $c = "A";
                $sheet->setCellValue(($c++) . $i, $fac->interview_date);
                $sheet->setCellValue(($c++) . $i, $fac->id);
                $sheet->setCellValue(($c++) . $i, $fac->printcardno);
                $sheet->setCellValue(($c++) . $i, $fac->g_patient);
                $sheet->setCellValue(($c++) . $i, $fac->name_en);
                $sheet->setCellValue(($c++) . $i, $fac->g_age);
                $sheet->setCellValue(($c++) . $i, $fac->totalFM);
                $sheet->setCellValue(($c++) . $i, $fac->female);
                $i++;
            }
            $sheet->getStyle('A5:W' . ($i - 1))
                ->getBorders()->getAllBorders()
                ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $excel->download('xlsx');
            exit();
        }

//
    }



}

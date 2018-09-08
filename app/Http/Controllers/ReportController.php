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
        $address = 'ភូមិ '.$gInfo['village'][0]->name_kh.' ឃុំ/សង្កាត់ '.$gInfo['commune'][0]->name_kh.' ស្រុក/ខណ្ឌ '.$gInfo['district'][0]->name_kh.' ខេត្ត/ក្រុង '.$gInfo['provinces'][0]->name_kh;

        $template->setValue('interview_date',$gInfo->interview_date);
        $template->setValue('expire_date',$gInfo->expire_date);
        $template->setValue('hospital',$gInfo['hospital'][0]->name_kh);
        $template->setValue('interview_code',$gInfo->interview_code);
        $template->setValue('address',$address);
        $template->setValue('location',$gInfo->g_local_village);
        $template->setValue('hhid',$gInfo->printcardno);
        $template->setValue('score',$gInfo['score'][0]->total);
        $template->setValue('p',$gInfo['shpHouseholds'][0]->poorcategory);

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

        $memberFamily = DB::select("
              SELECT 
                p.name_kh AS province,
                hf.name_kh AS hospital,
                COUNT(*) AS num,
                gi.hf_code, 
                year(gi.interview_date) as  `year`,
                month(gi.interview_date) as `month`
            FROM `post-id`.general_information gi
            INNER JOIN dev_pmrs_share.provinces p ON gi.g_province_id = p.code
            INNER JOIN dev_pmrs_share.health_facilities hf ON gi.hf_code = hf.code
            WHERE YEAR(gi.interview_date) = '$year'
            GROUP BY gi.hf_code ,month(gi.interview_date) , year(gi.interview_date) ");

        $tmp_data = [];
        if(!empty($memberFamily) && is_array($memberFamily)){
            foreach ($memberFamily as $i => $v){
                $tmp_data[$v->hf_code]['province'] = $v->province;
                $tmp_data[$v->hf_code]['hf_name'] = $v->hospital;
                $tmp_data[$v->hf_code]['datas'][$v->year][$v->month] = $v->num;
            }
        }
        return $tmp_data;
    }

    public function generateReportByYear(request $request){
        $this->validate($request, [
            'year' => 'required',
        ]);

        $year  = $request->year;
        $memberFamily = $this->reportBymonth($year);
        if(empty($memberFamily)) {
            return Redirect::back()->with('danger','មិនមានទិន្ន័យសំភាសអ្នកជំងឺទេ');
          //  die('No Data');
        }
        //dd($memberFamily);
        $excel = Excel::load(public_path('template/Post_ID_Report_Format.xlsx'));
        $sheet  = $excel->setActiveSheetIndex(0);
        $sheet->setCellValue('B1', $year);
        $r = 5;
        foreach ($memberFamily as $i => $fac){
            foreach ($fac['datas'] as $y => $months){
                $c  = "A";
                $tt = 0;
                $sheet->setCellValue(($c++) . $r , $r - 4);
                $sheet->setCellValue(($c++) . $r , $fac['province']);
                $sheet->setCellValue(($c++) . $r , $fac['hf_name']);
                $sheet->setCellValue(($c++) . $r , $y);
                for($k =1; $k<=12 ; $k++){
                    $mval = isset($months[$k])? $months[$k] :0;
                    $sheet->setCellValue(($c++) . $r ,$mval);
                    $tt += $mval;
                }
                $sheet->setCellValue(($c++) . $r , $tt);
                $r++;
            }
        }
        $sheet->getStyle('A5:Q'.($r-1))
            ->getBorders()->getAllBorders()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $excel->download('xlsx');
        exit();
//        Excel::create($fileName, function($excel) {
//            $data = ["No","Province","Hospital Name","Jan","Feb","Mar","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","Total"];
//            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
//                $sheet->setTitle('Report By Month Aug');
//
//                $sheet->setOrientation('landscape');
//                $sheet->setBorder('A3:O3');
//                $sheet->fromArray($data, null, 'A3');
//                $sheet->cells('A3:O3', function($cells) {
//                    $cells->setBackground('#AAAAFF');
//                    $cells->setFont(array(
//                        'name' => 'Arial',
//                        'size' => 12,
//                        'bold' => true
//                    ));
//                });
//
//                $now   = Carbon::now();
//                $year  = $now->year;
//                $month = $now->month;
//
//                $sheet->cells('A1', function($cells){
//                    $cells->setValue('Year');
//                    $cells->setFontWeight('bold');
//                });
//                $sheet->cells('B1', function($cells) use ($year) {
//                    $cells->setValue($year);
//                    $cells->setFontWeight('bold');
//                });
//                $sheet->cells('B2', function($cells){
//                    $cells->setValue('Post ID Report');
//                    $cells->setFontWeight('bold');
//                    $cells->setFontSize(16);
//
//                });
//
//                $memberFamily = DB::select("SELECT p.name_kh AS province,hf.name_kh AS hospital,gi.hf_code,COUNT(*) AS num,
//gi.hf_code, year(gi.created_at) year, month(gi.created_at) month
//FROM `post-id`.general_information gi
//INNER JOIN dev_pmrs_share.provinces p ON gi.g_province_id = p.code
//INNER JOIN dev_pmrs_share.health_facilities hf ON gi.hf_code = hf.code
//WHERE YEAR(gi.created_at) = '$year' and month(gi.created_at) = '$month'
//GROUP BY gi.hf_code ,month(gi.created_at) , year(gi.created_at) ");
//                $i = 4;
//                $num = 1;
//                foreach ($memberFamily as $record) {
//                    $j = 'B';
//                    foreach($record as $key => $value) {
//
//                        $sheet->cell($j.$i, function($cell) use ($value) {
//                            $cell->setValue($value);
//                            $cell->setFont(array(
//                                'name' => 'Kh Battambang',
//                                'size' => 11,
//                            ));
//                        });
//
//                        $sheet->cell('A'.$i, function($cell) use ($num) {
//                            $cell->setValue($num);
//                            $cell->setAlignment('center');
//                        });
//                        $sheet->setBorder('A'.$i.':O'.$i);
//                        $j++;
//                    }
//                    $i++;
//                    $num++;
//                }
//
//            });
//        })->download('xlsx');
    }



}

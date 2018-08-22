<?php

namespace App\Http\Controllers;
use App\model\GeneralInformationModel;
use DB;
use auth;
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpWord;
use Excel;
use Carbon\Carbon;
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


    /*
     * generate
     * member family interview
     */

    public function pirntInterviewResult($id){
        $id = Crypt::decrypt($id);
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = new \PhpOffice\PhpWord\TemplateProcessor('template/Post_ID_result_printing_form.docx');

        $gInfo             = GeneralInformationModel::with('hospital','provinces','district','commune','village')->findOrFail($id);

        $memberFamily = DB::select("select mf.nick_name,g.name_kh as sex,mf.dob,mf.age,fr.name_kh as relation from member_family mf 
                                    inner join gender g on mf.gender_id = g.id
                                    inner join relationship fr on mf.family_relationship_id = fr.id
                                    where mf.g_information_id = '$id'");
        $address = 'ភូមិ '.$gInfo['village'][0]->name_kh.' ឃុំ/សង្កាត់ '.$gInfo['commune'][0]->name_kh.' ស្រុក/ខណ្ឌ '.$gInfo['district'][0]->name_kh.' ខេត្ត/ក្រុង '.$gInfo['provinces'][0]->name_kh;
        $template->setValue('hospital',$gInfo['hospital'][0]->name_kh);
        $template->setValue('interview_code',$gInfo->interview_code);
        $template->setValue('address',$address);
        $template->setValue('location',$gInfo->g_local_village);
        $template->setValue('id',$id);
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

    public function generateReportByMonth(){
        $fileName = "Report"."_".date('dmYHis');
        Excel::create($fileName, function($excel) {
            $data = ["No","Province","Hospital Name","Jan","Feb","Mar","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","Total"];
            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
                $sheet->setTitle('Report By Month Aug');

                $sheet->setOrientation('landscape');
                $sheet->setBorder('A3:O3');
                $sheet->fromArray($data, null, 'A3');
                $sheet->cells('A3:O3', function($cells) {
                    $cells->setBackground('#AAAAFF');
                    $cells->setFont(array(
                        'name' => 'Arial',
                        'size' => 12,
                        'bold' => true
                    ));
                });

                $now   = Carbon::now();
                $year  = $now->year;
                $month = $now->month;

                $sheet->cells('A1', function($cells){
                    $cells->setValue('Year');
                    $cells->setFontWeight('bold');
                });
                $sheet->cells('B1', function($cells) use ($year) {
                    $cells->setValue($year);
                    $cells->setFontWeight('bold');
                });
                $sheet->cells('B2', function($cells){
                    $cells->setValue('Post ID Report');
                    $cells->setFontWeight('bold');
                    $cells->setFontSize(16);

                });

                $memberFamily = DB::select("select p.name_kh as province,hf.name_kh as hospital from `post-id`.general_information gi
                                        inner join dev_pmrs_share.provinces p on gi.g_province_id = p.code
                                        inner join dev_pmrs_share.health_facilities hf on gi.hf_code = hf.code
                                        where YEAR(gi.created_at) = '$year' and  MONTH(gi.created_at) = '$month'");
                $i = 4;
                $num = 1;
                foreach ($memberFamily as $record) {
                    $j = 'B';
                    foreach($record as $key => $value) {
                        $sheet->cell($j.$i, function($cell) use ($value) {
                            $cell->setValue($value);
                            $cell->setFont(array(
                                'name' => 'Kh Battambang',
                                'size' => 11,
                            ));
                        });

                        $sheet->cell('A'.$i, function($cell) use ($num) {
                            $cell->setValue($num);
                            $cell->setAlignment('center');
                        });
                        $sheet->setBorder('A'.$i.':O'.$i);
                        $j++;
                    }
                    $i++;
                    $num++;
                }

            });
        })->download('xlsx');
    }



}

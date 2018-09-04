<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
use DB;
use App\Helpers\PreIdRoundManager;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use auth;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     * get data with ajax
     */
    public function getInterviewCode(request $request){
        $od_code = $request->od_code;
        $query = Helpers::getInterviewCode($od_code);
        $check = DB::select("SELECT count(*) as id FROM general_information gi where gi.od_code=".$od_code);
        $interview_code= $check[0]->id + 1;
        echo  json_encode($query[0]->shortcut.'/'.date('y m d').'/0'.$interview_code);

    }

    /*
     * get data with ajax health_facilities
     */
    public function getHealthFacilitiesCode(request $request){
        $od_code = $request->od_code;
        $hf_code  = substr($request->hospital,36);
        $query   = Helpers::getHealthFacilitiesCode($od_code,$hf_code);
        echo  json_encode($query[0]->hf_code);
    }

    public function getdatacode(request $request){
        $od_code = $request->od_code;
        $query = Helpers::getInterviewCode($od_code);
        $check = DB::select("SELECT count(*) as id FROM general_information gi where gi.od_code=".$od_code);
        $interview_code= $check[0]->id + 1;
        echo json_encode($query[0]->shortcut.'/'.date('y m d').'/0'.$interview_code);
    }

    /*
     * get data with ajax
     */
    public function getDistrict(request $request){
        $pro_code = $request->province_id;
        $query = Helpers::getDistrict($pro_code);
        //$pro = isset($_GET['pro']) ? $_GET['pro'] : '';
        $iDate = date('Y-m-d');
        $result= array('expiredDate'=> null, 'odData'=>array());
        $val = array('expired'=> date('d M ').(date('Y') + 1));
        if($pro_code != '' && $iDate != ''){
            $preObj = new PreIdRoundManager($pro_code, $iDate);
            $val['expired'] = date('Y-m-d', strtotime($preObj->getPostExpireDate()));
        }
        $result['expiredDate'] = $val;
        $result['odData'] = $query;
        //echo json_encode($val);
        echo json_encode($result);
    }


    public function getCommune(request $request){
        $district_code = $request->district_id;
        $query = Helpers::getCommune($district_code);
        echo json_encode($query);
    }


    public function getVillage(request $request){
        $commune_code = $request->commune_id;
        $query = Helpers::getVillage($commune_code);
        echo json_encode($query);
    }

    public function getPrintCardNo(request $request){
        $printCard = $request->village_id;
        $label = $request->label;
        $query = Helpers::getPrintNoCard($printCard);

        if($query[0]->card == null || $query[0]->card == ''){
            $card = $label.'-'."0001";
            $num = "0001";
        }else{
            $print_card = substr($query[0]->card,-4);
            $n = ($print_card+1);
            $numlength = strlen((string)$n);

            if($numlength == 3){
                $nd = 0;
                $num = $nd.$n;
            }elseif($numlength == 2){
                $nd = 00;
                $num = $nd.$n;
            }elseif ($numlength == 1){
                $nd = 000;
                $num = $nd.$n;
            }else{
                $num = $n;
            }
            $card = $label.'-'.($num);
        }
        $result= array('hhid'=> ($num), 'result_card'=>$card);
        return $result;
    }

    /*
     * by pheaktra
     * function get view with datatable
     */

    public function getPatientView(){
        $view = DB::select("select 
            gi.id,gi.interview_code,gi.g_patient,gi.g_age,gg.name_kh as g_sex,gi.g_phone
            from general_information gi
            inner join gender gg on gi.g_sex = gg.id
            where gi.record_status = 1
            group by gi.interview_code order by gi.id desc");

        foreach ($view as $i =>$v){
            $view[$i]->view = route('view.data', Crypt::encrypt($v->id));
            $view[$i]->edit = route('editpatient.edit', Crypt::encrypt($v->id));
            $view[$i]->print = route('print.data', Crypt::encrypt($v->id));
            $view[$i]->delete = route('deletepatient.delete', Crypt::encrypt($v->id));
            $view[$i]->printInterviewResult = route('printInterviewResult.print', Crypt::encrypt($v->id));
            $view[$i]->txtprint_result='លទ្ធផលវាយតម្លៃសំរាប់អ្នកជំងឺ';
            $view[$i]->txtview = 'មើលពិន្ទុនៃការសំភាស';
            $view[$i]->txtedit = 'ការធ្វើបច្ចប្បន្នភាព';
            $view[$i]->txtprint = 'បោះពុម្ព';
            $view[$i]->txtdelete = 'លុបការសំភាស';
        }
        return Datatables::of($view)->addIndexColumn()->make(true);
    }

}

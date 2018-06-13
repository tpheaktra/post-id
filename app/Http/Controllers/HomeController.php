<?php

namespace App\Http\Controllers;

use App\model\DebtLoanLinkModel;
use App\model\GeneralInformationModel;
use App\model\GeneralSituationFamilyModel;
use App\model\HomePreparLinkModel;
use App\model\HouseHoldFamilyLinkModel;
use App\model\HouseholdVehicleModel;
use App\model\HouseoldConsumerModel;
use App\model\MemberFamilyModel;
use App\model\TypeIncomeModel;
use Illuminate\Http\Request;
use App\model\RelationshipModel;
use App\model\FamilyrelationModel;
use App\Helpers\Helpers;
use App\model\ConditionhouseModel;
use App\model\WallMadeModel;
use App\model\RoofMadeModel;
use DB;
use auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = DB::select("SELECT count(*) as count, concat('', lpad(max(id)+1,2,'0')) AS id  FROM general_information");

        if($check[0]->count == 0){
            $interview_code= auth::user()->province.'-'.date('ymd').'01';
        }else{
            $interview_code= auth::user()->province.'-'.date('ymd').$check[0]->id;
        }


        $provinces     = Helpers::getProvince();
        $relationship  = RelationshipModel::all();
        $gender        = Helpers::getGender();
        $household     = Helpers::getHouseHoldFamily();
        $homePrepar    = Helpers::getHomePrepar();

        $condition_house  = Helpers::getConditionHouse();
        $question         = Helpers::getQuestion();
        $electricgrid     = Helpers::getElectricGird();

        $condition_house = Helpers::getConditionHouse();
        $question = Helpers::getQuestion();
        $electricgrid   = Helpers::getElectricGird();

        $landAgricultural = Helpers::getLangAgricultural();

        $loan             = Helpers::getLoan();
        $family           = Helpers::getFamilyRelation();
        $occupation       = Helpers::getOccupation();
        $education_level  = Helpers::getEducationLevel();

        $roof_made = Helpers::getRoofmade();
        $wall_made = Helpers::getWallmade();
        $house_status = ConditionhouseModel::all();

        $typemeterial = Helpers::getTypeMeterial();
        $typeanimals = Helpers::getTypeAnimals();

        $question_electric = Helpers::getQuestionElectric();
        return view('home',compact('relationship',
            'provinces','gender','household',
            'homePrepar','condition_house','question','electricgrid',

            'landAgricultural','loan','family','occupation','education_level',

            'landAgricultural','loan','family','roof_made','wall_made','house_status',
            'question_electric','typemeterial','typeanimals'))->with('interview_code',$interview_code);

    }
    public function view(){
         $gender = Helpers::getGender();
        return view('view',compact('gender'));
    }
    /*
     * get data with ajax
     */
    public function getDistrict(request $request){
        $pro_code = $request->province_id;
        $query = Helpers::getDistrict($pro_code);
        echo json_encode($query);
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


    public function insert(request $request){

        $check = DB::select("SELECT count(*) as count, concat('', lpad(max(id)+1,2,'0')) AS id  FROM general_information");

        if($check[0]->count == 0){
            $interview_code= auth::user()->province.'-'.date('Ymd').'01';
        }else{
            $interview_code= auth::user()->province.'-'.date('Ymd').$check[0]->id;
        }


        $data = array(
            'interview_code'  =>$interview_code,
            'g_patient'       =>$request->g_patient,
            'g_age'           =>$request->g_age,
            'g_sex'           =>$request->g_sex,
            'g_phone'         =>$request->g_phone,
            'g_province'      =>$request->g_province,
            'g_district'      =>$request->g_district,
            'g_commune'       =>$request->g_commune,
            'g_village'       =>$request->g_village,
            'g_local_village' =>$request->g_local_village,
            //interview
            'inter_patient'      =>$request->inter_patient,
            'inter_age'          =>$request->inter_age,
            'inter_sex'          =>$request->inter_sex,
            'inter_phone'        =>$request->inter_phone,
            'inter_relationship' =>$request->inter_relationship,
            //family
            'fa_patient'      =>$request->fa_patient,
            'fa_age'          =>$request->fa_age,
            'fa_sex'          =>$request->fa_sex,
            'fa_phone'        =>$request->fa_phone,
            'fa_relationship' =>$request->fa_relationship,
        );
        $gn_info = GeneralInformationModel::create($data);
       //echo $gn_info->id;
       foreach ($request->nick_name as $key => $val){
           $member_family = array(
               'g_information_id'     => $gn_info->id,
               'nick_name'            => $val,
               'dob'                  => $request->dob[$key],
               'age'                  => $request->age[$key],
               'family_relationship'  => $request->family_relationship[$key],
               'occupation'           => $request->occupation[$key],
               'education_level'      => $request->education_level[$key],

           );
          // echo json_encode($member_family);
           MemberFamilyModel::create($member_family);
       }

        $household_link = $request->household_family_id;
        if($household_link == 5){
            $hlink = array(
                'household_family_id'=>$household_link,
                'institutions_name'=>$request->institutions_name,
                'instatutions_phone'=>$request->instatutions_phone
                );
            HouseHoldFamilyLinkModel::create($hlink);
        }

        $homePre = $request->home_prepar;
        if($homePre == 2){
            $hPre = array(
                'home_prepar_id'=>$homePre,
                'home_year'=>$request->home_year,
            );
            HomePreparLinkModel::create($hPre);
        }

        $general_situation_family = array(
            'g_information_id'    =>$gn_info->id,
            'household_family_id' =>$household_link,
            'total_people'        =>$request->total_people,

            'ground_floor_length' =>$request->ground_floor_length,
            'ground_floor_width'  =>$request->ground_floor_width,
            'ground_floor_area'   =>$request->ground_floor_area,
            'upper_floor_length'  =>$request->upper_floor_length,
            'upper_floor_width'   =>$request->upper_floor_width,
            'upper_floor_area'    =>$request->upper_floor_area,
            'further_floor_length' =>$request->further_floor_length,
            'further_floor_width'  =>$request->further_floor_width,
            'further_floor_area'   =>$request->further_floor_area,
            'total_area'           =>$request->total_area,

            'tolet'                =>$request->tolet,
            'tolet_1'              =>$request->tolet_1,
            'tolet_2'              =>$request->tolet_2,

            'h_build_year_id'      =>$request->h_build_year_id,
            'home_prepar_id'       => $homePre,
            'roof_made'            =>$request->roof_made,
            'roof_status'          =>$request->roof_status,
            'walls_made'           =>$request->walls_made,
            'walls_status'         =>$request->walls_status,

            'condition_house_id'   =>$request->condition_house,
            'rent_fee'             =>$request->rent_fee,

            'q_electric_id'=>$request->q_electric,
            'costs_in_hour'=>$request->costs_in_hour,
            'number_in_month'=>$request->number_in_month,
            'costs_per_month'=>$request->costs_per_month,
            'electric_grid_id'=>$request->electric_grid_id,
            'go_hospital'=>$request->go_hospital,

            'land_agricultural_id' =>$request->land,
            'land_name'            =>$request->land_name,
            'total_land'           =>$request->total_land,
            'land_farm'            =>$request->land_farm,
            'total_land_farm'      =>$request->total_land_farm,
            'debt_family_id'       =>$request->debt_family_id,
        );
        $gSFamily = GeneralSituationFamilyModel::create($general_situation_family);

        foreach ($request->type_meterial as $key => $val) {
            $meterial = array(
                'g_situation_family_id' => $gSFamily->id,
                'type_meterial'         => $val,
                'number_meterial'       => $request->number_meterial[$key],
                'market_value_meterial' => $request->market_value_meterial[$key],
                'total_rail'            => $request->total_rail[$key],
                'total_meterial_costs'  => $request->total_meterial_costs
            );
            HouseoldConsumerModel::create($meterial);
        }
       //household vehicle
        foreach ($request->type_vehicle as $key => $vi) {
            $vehicle = array(
                'g_situation_family_id' => $gSFamily->id,
                'type_vehicle'         => $vi,
                'number_vehicle'       => $request->number_vehicle[$key],
                'market_value_vehicle' => $request->market_value_vehicle[$key],
                'total_rail_vehicle'   => $request->total_rail_vehicle[$key],
                'total_vehicle_costs'  => $request->total_vehicle_costs
            );
            HouseholdVehicleModel::create($vehicle);
        }


        //household vehicle
        foreach ($request->type_animals as $key => $anim) {
            $animals = array(
                'g_situation_family_id' => $gSFamily->id,
                'type_animals'          => $anim,
                'num_animals_big'       => $request->num_animals_big[$key],
                'num_animals_small'     => $request->num_animals_small[$key],
                'note_animals'          => $request->note_animals[$key],
                'total_animals_costs'   => $request->total_animals_costs
            );
            TypeIncomeModel::create($animals);
        }



        //គ.១៤) បំណុលគ្រួសារ
            $debt = array(
                'g_situation_family_id' => $gSFamily->id,
                'loan_id'               => $request->family_debt_id,
                'question_id'           => $request->q_debt,
                'total_debt'            => $request->total_debt,
            );
            DebtLoanLinkModel::create($debt);
        return back()->with('success','Data input success.');
    }

}

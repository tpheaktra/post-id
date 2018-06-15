<?php

namespace App\Http\Controllers;
use App\model\DebtLoanLinkModel;
use App\model\GeneralInformationModel;
use App\model\GeneralSituationFamilyModel;
use App\model\HomePreparLinkModel;
use App\model\HouseHoldFamilyLinkModel;
use App\model\HouseholdRentPriceModel;
use App\model\HouseHoldRootLinkModel;
use App\model\HouseholdVehicleModel;
use App\model\HouseoldConsumerModel;
use App\model\LandAgriculturalLinkModel;
use App\model\MemberFamilyModel;
use App\model\NoElectricLinkModel;
use App\model\OtherIncomeModel;
use App\model\TypeIncomeModel;
use App\model\YesElectricLinkModel;
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
        $typetransport = Helpers::getTypeTransportation();

        $question_electric = Helpers::getQuestionElectric();
        $view = DB::select("select 
gi.interview_code,gi.g_patient,gi.g_age,gg.name_kh,gi.g_patient,gi.g_phone,

   #household
	hf.name_kh as hosehold,hfl.institutions_name,hfl.instatutions_phone,
	rm.name_kh as root_made,ch.name_kh as root_status,
	wm.name_kh as walls_made,ch1.name_kh as walls_status,
	hrpl.house_rent_price
	
 from general_information gi
inner join member_family mf on gi.id = mf.g_information_id
inner join general_situation_family gsf on gi.id = gsf.g_information_id 
inner join gender gg on gi.g_sex = gg.id


left join household_family_link hfl on gsf.g_information_id = hfl.g_information_id
left join household_root_link hrl on gsf.g_information_id = hrl.g_information_id
left join household_rent_price_link hrpl on gsf.g_information_id = hrpl.g_information_id
left join household_family hf on hfl.household_family_id = hf.id or hrl.household_family_id = hf.id or hrpl.household_family_id = hf.id

left join roof_made rm on hrl.roof_made_id = rm.id
left join wall_made wm on hrl.walls_made_id = wm.id
left join condition_house ch on hrl.roof_status_id = ch.id 
left join condition_house ch1 on hrl.walls_status_id = ch1.id


group by gi.interview_code order by gi.id desc");
        return view('home',compact('relationship',
            'provinces','gender','household',
            'homePrepar','condition_house','question','electricgrid',

            'landAgricultural','loan','family','occupation','education_level',

            'landAgricultural','loan','family','roof_made','wall_made','house_status',
            'question_electric','typemeterial','typeanimals',
            'typetransport','view'))->with('interview_code',$interview_code);

    }
    public function view($id){
         $patient = DB::select("select gi.id,gi.interview_code,gi.g_patient,gi.g_age,gg.name_kh,gi.g_patient,gi.g_phone,gi.g_local_village as g_local_village, 
                p.name_kh as province, d.name_kh as district,c.name_kh as commune, v.name_kh as village from general_information gi
                inner join member_family mf on gi.id = mf.g_information_id
                inner join general_situation_family gsf on gi.id = gsf.g_information_id 
                inner join gender gg on gi.g_sex = gg.id
                inner join dev_pmrs_share.provinces p on gi.g_province_id = p.code
                inner join dev_pmrs_share.districts d on gi.g_district_id = d.code
                inner join dev_pmrs_share.communes c on gi.g_commune_id = c.code
                inner join dev_pmrs_share.villages v on gi.g_village_id = v.code
               where gi.id ='$id' group by gi.id order by gi.id desc 
            "); 
        $gender = Helpers::getGender();
        return view('view',compact('gender','patient'));
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
            'interview_code'     =>$interview_code,
            'g_patient'          =>$request->g_patient,
            'g_age'              =>$request->g_age,
            'g_sex'              =>$request->g_sex,
            'g_phone'            =>$request->g_phone,
            'g_province_id'      =>$request->g_province,
            'g_district_id'      =>$request->g_district,
            'g_commune_id'       =>$request->g_commune,
            'g_village_id'       =>$request->g_village,
            'g_local_village'    =>$request->g_local_village,
            //interview
            'inter_patient'      =>$request->inter_patient,
            'inter_age'          =>$request->inter_age,
            'inter_sex'          =>$request->inter_sex,
            'inter_phone'        =>$request->inter_phone,
            'inter_relationship_id' =>$request->inter_relationship,
            //family
            'fa_patient'          =>$request->fa_patient,
            'fa_age'              =>$request->fa_age,
            'fa_sex'              =>$request->fa_sex,
            'fa_phone'            =>$request->fa_phone,
            'fa_relationship_id'  =>$request->fa_relationship,
        );
        $gn_info = GeneralInformationModel::create($data);
        //step2
       //echo $gn_info->id;
       foreach ($request->nick_name as $key => $val){
           $member_family = array(
               'g_information_id'        => $gn_info->id,
               'nick_name'               => $val,
               'dob'                     => $request->dob[$key],
               'age'                     => $request->age[$key],
               'family_relationship_id'  => $request->family_relationship[$key],
               'occupation_id'           => $request->occupation[$key],
               'education_level_id'      => $request->education_level[$key],
           );
          // echo json_encode($member_family);
           MemberFamilyModel::create($member_family);
       }

        //step 3
        $household_link = $request->household_family_id;
        if($household_link == 1 || $household_link == 3){
            $hlink1 = array(
                'household_family_id' =>$household_link,
                'g_information_id'    =>$gn_info->id,
                'roof_made_id'        =>$request->roof_made,
                'roof_status_id'      =>$request->roof_status,
                'walls_made_id'       =>$request->walls_made,
                'walls_status_id'     =>$request->walls_status,
                'condition_house_id'  =>$request->condition_house
            );
            HouseHoldRootLinkModel::create($hlink1);
        }elseif($household_link == 2){
            $hlink2 = array(
                'household_family_id' =>$household_link,
                'g_information_id'    =>$gn_info->id,
                'house_rent_price'    =>$request->rent_fee
            );
            HouseholdRentPriceModel::create($hlink2);
        } elseif($household_link == 5){
            $hlink = array(
                'household_family_id' =>$household_link,
                'g_information_id'    =>$gn_info->id,
                'institutions_name'   =>$request->institutions_name,
                'instatutions_phone'  =>$request->instatutions_phone
                );
            HouseHoldFamilyLinkModel::create($hlink);
        }

//        $homePre = $request->home_prepar;
//        if($homePre == 2){
//            $hPre = array(
//                'home_prepar_id'=>$homePre,
//                'home_year'=>$request->home_year,
//            );
//            HomePreparLinkModel::create($hPre);
//        }

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

//            'tolet'                =>$request->tolet,
//            'tolet_1'              =>$request->tolet_1,
//            'tolet_2'              =>$request->tolet_2,
              'q_electric_id'=>$request->q_electric,
              'transport_id'=>$request->go_hospital,
              'land_agricultural_id' =>$request->land,

                'kids_then65'     =>$request->kids_then65,
                'old_bigger65'    =>$request->old_bigger65,
                'kids_50_then65'  =>$request->kids_50_then65,
                'old_50_bigger65' =>$request->old_50_bigger65,
                'debt_family_id'  =>$request->debt_family_id,
        );
        GeneralSituationFamilyModel::create($general_situation_family);

        foreach ($request->type_meterial as $key => $val) {
            $meterial = array(
                'g_information_id'      =>$gn_info->id,
                'type_meterial_id'      => $val,
                'number_meterial'       => $request->number_meterial[$key],
                'market_value_meterial' => $request->market_value_meterial[$key],
                'total_rail'            => $request->total_rail_meterial[$key],
                'total_meterial_costs'  => $request->total_meterial_costs
            );
            HouseoldConsumerModel::create($meterial);
        }

        $q_electric = $request->q_electric;
        if($q_electric == 1){
            $e = array(
                'q_electric_id'        =>$q_electric,
                'g_information_id'     =>$gn_info->id,
                'costs_in_hour'        =>$request->costs_in_hour,
                'number_in_month'      =>$request->number_in_month,
                'costs_per_month'      =>$request->costs_per_month,
            );
            YesElectricLinkModel::create($e);
        }elseif($q_electric == 2){
            $e1 = array(
                'q_electric_id'       =>$q_electric,
                'g_information_id'    =>$gn_info->id,
                'electric_grid_id'    =>$request->electric_grid_id
            );
            NoElectricLinkModel::create($e1);
        }

        //household vehicle
        foreach ($request->type_vehicle as $key => $vi) {
            $vehicle = array(
                'g_information_id'     => $gn_info->id,
                'type_vehicle_id'      => $vi,
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
                'g_information_id'      =>  $gn_info->id,
                'type_animals_id'       => $anim,
                'num_animals_big'       => $request->num_animals_big[$key],
                'num_animals_small'     => $request->num_animals_small[$key],
                'note_animals'          => $request->note_animals[$key],
                'total_animals_costs'   => $request->total_animals_costs
            );
            TypeIncomeModel::create($animals);
        }

        //គ.១២.១.២​)ដីកសិកម្ម
        $land_agricultural = array(
            'g_information_id'     =>  $gn_info->id,
            'land_agricultural_id' => $request->land,
            'land_name'            => $request->land_name,
            'total_land'           => $request->total_land,
            'land_farm'            => $request->land_farm,
            'total_land_farm'      => $request->total_land_farm
        );
        LandAgriculturalLinkModel::create($land_agricultural);

        //
        foreach ($request->income_name as $key => $in) {
            $other_income = array(
                'g_information_id'  => $gn_info->id,
                'income_name'       => $in,
                'income_age'        => $request->income_age[$key],
                'income_occupation' => $request->income_occupation[$key],
                'income_unit'       => $request->income_unit[$key],
                'unit_in_month'     => $request->unit_in_month[$key],
                'average_amount'    => $request->average_amount[$key],
                'monthly_income'    => $request->monthly_income[$key],
                'total_mon_income'  => $request->total_mon_income[$key],
                'total_inc_person'  => $request->total_inc_person[$key],
            );
            OtherIncomeModel::create($other_income);
        }





        //គ.១៤) បំណុលគ្រួសារ
            $debt = array(
                'g_information_id' => $gn_info->id,
                'loan_id'               => $request->family_debt_id,
                'question_id'           => $request->q_debt,
                'total_debt'            => $request->total_debt,
            );
            DebtLoanLinkModel::create($debt);
        return back()->with('success','Data input success.');
    }

}

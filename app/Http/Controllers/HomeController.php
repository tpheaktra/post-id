<?php

namespace App\Http\Controllers;
use App\model\DebtLoanLinkModel;
use App\model\GeneralInformationModel;
use App\model\GeneralSituationFamilyModel;
use App\model\HealthDisabilityModle;
use App\model\HomePreparLinkModel;
use App\model\HouseHoldFamilyLinkModel;
use App\model\HouseholdRentPriceModel;
use App\model\HouseHoldRootLinkModel;
use App\model\HouseholdVehicleModel;
use App\model\HouseoldConsumerModel;
use App\model\LandAgriculturalLinkModel;
use App\model\LandOtherAgriculturalLinkModel;
use App\model\MemberFamilyModel;
use App\model\NoElectricLinkModel;
use App\model\OtherIncomeModel;
use App\model\OtherIncomeNotAgricultureModel;
use App\model\ShpHouseholdsModel;
use App\model\TypeIncomeModel;
use App\model\TypeToiletLinkModel;
use App\model\YesElectricLinkModel;
use App\model\StoreScoreModel;
use App\User;
use Illuminate\Http\Request;
use App\model\RelationshipModel;
use App\Helpers\Helpers;
use App\model\ConditionhouseModel;
use Illuminate\Support\Facades\Redirect;
use DB;
use auth;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Symfony\Component\Console\Input\Input;
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


    public function base($hospID){
        $id = auth::user()->id;
        User::where('id',$id)->update(array('hos_base'=>$hospID));
        return back();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hospital          = Helpers::getHospital();
        $provinces         = Helpers::getProvince();
        $relationship      = RelationshipModel::all();
        $gender            = Helpers::getGender();
        $household         = Helpers::getHouseHoldFamily();
        $homePrepar        = Helpers::getHomePrepar();
        $condition_house   = Helpers::getConditionHouse();
        $question          = Helpers::getQuestion();
        $electricgrid      = Helpers::getElectricGird();
        $landAgricultural  = Helpers::getLangAgricultural();
        $loan              = Helpers::getLoan();
        $family            = Helpers::getFamilyRelation();
        $occupation        = Helpers::getOccupation();
        $education_level   = Helpers::getEducationLevel();
        $roof_made         = Helpers::getRoofmade();
        $wall_made         = Helpers::getWallmade();
        $house_status      = ConditionhouseModel::all();
        $typemeterial      = Helpers::getTypeMeterial();
        $typeanimals       = Helpers::getTypeAnimals();
        $typetransport     = Helpers::getTypeTransportation();
        $question_electric = Helpers::getQuestionElectric();
        $question_totel    = Helpers::getQuestionTolet();
        $health            = Helpers::getHealth();

        $view = DB::select("select 
            gi.id,gi.interview_code,gi.g_patient,
            gi.g_age,gg.name_kh as g_sex,gi.g_phone,
            us.name as interview_by,gi.user_id,gi.interview_date
            from general_information gi
            inner join gender gg on gi.g_sex = gg.id
            inner join users us on gi.user_id = us.id
            where gi.record_status = 1
            group by gi.interview_code order by gi.id desc");

        return view('home',compact('hospital','relationship',
            'provinces','gender','household',
            'homePrepar','condition_house','question','electricgrid',
            'landAgricultural','loan','family','occupation','education_level',
            'landAgricultural','loan','family','roof_made','wall_made','house_status',
            'question_electric','typemeterial','typeanimals',
            'typetransport','question_totel','health','view'));
    }



    public function view($id){
        $id = Crypt::decrypt($id);
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
//          $score= DB::select('select *from general_information gi left join store_score sc on sc.patient = gi.id

// where gi.id = $id');
        $score_list = DB::select("
         select sc.patient,
         sc.size_member,
         sc.toilet,
         sc.roof,
         sc.wall,
         sc.house_status,
         sc.price_rent_house,
         sc.price_electronic,
         sc.use_energy_elect,
         sc.no_energy_elect,
         sc.vehicle,
         sc.animal,
         sc.personal_farm,
         sc.other_farm,
         sc.income_out_farmer,
         sc.income_out_not_farmer,
         sc.income_child,
         sc.disease,
         sc.debt,
         sc.edu,
         sc.age_action,
         sc.total,
         sc.record_status
         from general_information gi inner join store_score sc on gi.id = sc.patient where gi.id = '$id'");
        $gender = Helpers::getGender();
        return view('view',compact('gender','patient','score_list'));
    }



    public function print($id){
        $id = Crypt::decrypt($id);

        $hospital         = Helpers::getHospital();
        $provinces        = Helpers::getProvince();
        $relationship     = RelationshipModel::all();
        $gender           = Helpers::getGender();
        $household        = Helpers::getHouseHoldFamily();
        $homePrepar       = Helpers::getHomePrepar();
        $condition_house  = Helpers::getConditionHouse();
        $question         = Helpers::getQuestion();
        $electricgrid     = Helpers::getElectricGird();
        $landAgricultural = Helpers::getLangAgricultural();
        $loan             = Helpers::getLoan();
        $family           = Helpers::getFamilyRelation();
        $occupation       = Helpers::getOccupation();
        $education_level  = Helpers::getEducationLevel();
        $roof_made        = Helpers::getRoofmade();
        $wall_made        = Helpers::getWallmade();
        $house_status     = ConditionhouseModel::all();
        $typemeterial      = Helpers::getTypeMeterial();
        $typeanimals       = Helpers::getTypeAnimals();
        $typetransport     = Helpers::getTypeTransportation();
        $question_electric = Helpers::getQuestionElectric();
        $question_totel    = Helpers::getQuestionTolet();
        $health            = Helpers::getHealth();

        $ginfo             = GeneralInformationModel::with('district','commune','village')->findOrFail($id);
        $memberFamily      = MemberFamilyModel::with('generalInfo')->where('g_information_id',$id)->get();
        $gFamily           = GeneralSituationFamilyModel::where('g_information_id',$id)->first();
        $household_root    = HouseHoldRootLinkModel::where('household_family_id',$gFamily->household_family_id)->where('g_information_id',$id)->first();
        if($household_root == null){
            $homePreparLink = '';
        }else{
            $homePreparLink = HomePreparLinkModel::where('home_prepar_id',$household_root->home_prepare_id)->where('g_information_id',$id)->first();
        }
        $rendPrice = HouseholdRentPriceModel::where('g_information_id',$id)->where('household_family_id',$gFamily->household_family_id)->first();
        $institutions = HouseHoldFamilyLinkModel::where('g_information_id',$id)->where('household_family_id',$gFamily->household_family_id)->first();
        $toilet    = TypeToiletLinkModel::where('toilet_id',$gFamily->toilet_id)->where('g_information_id',$id)->first();
       // $material  = HouseoldConsumerModel::where('g_information_id',$id)->first();

        $material          = HouseoldConsumerModel::with('typemeterial')->where('g_information_id',$id)->get();
        $yesElectrict      = YesElectricLinkModel::where('g_information_id',$id)->where('q_electric_id',$gFamily->q_electric_id)->first();
        $noElectrict       = NoElectricLinkModel::where('g_information_id',$id)->where('q_electric_id',$gFamily->q_electric_id)->first();
        $vehicle           = HouseholdVehicleModel::where('g_information_id',$id)->get();
        $income            = TypeIncomeModel::where('g_information_id',$id)->get();
        $landAg            = LandAgriculturalLinkModel::where('g_information_id',$id)->where('land_agricultural_id',$gFamily->land_agricultural_id)->first();
        $otherIncome       = OtherIncomeModel::where('g_information_id',$id)->get();
        $healthLink        = DB::select("select * from health ht
                            left join (
                                select hl.g_information_id, hl.health_id, hl.kids_then65, hl.old_bigger65, hl.kids_50_then65, hl.old_50_bigger65
                                from health_link hl 
                                where hl.g_information_id='$id'
                            ) t on t.health_id = ht.id order by ht.id asc");//HealthDisabilityModle::leftJoin('health','id','health_id')->where('g_information_id',$id)->get();

       // dd($healthLink);
        $debt_link = DebtLoanLinkModel::where('g_information_id',$id)->first();
       // echo json_encode($ginfo);exit();

        return view('print',compact('hospital','relationship',
            'provinces','gender','household',
            'homePrepar','condition_house','question','electricgrid',
            'landAgricultural','loan','family','occupation','education_level',
            'landAgricultural','loan','family','roof_made','wall_made','house_status',
            'question_electric','typemeterial','typeanimals',
            'typetransport','question_totel','health','ginfo','memberFamily',
            'gFamily','household_root','homePreparLink','rendPrice','institutions','toilet',
            'material','yesElectrict','noElectrict','vehicle','income','landAg',
            'otherIncome','healthLink','debt_link'));

    }




    /*
     * by pheaktra
     * function save data to db
     */
    public function insert(request $request){
        //check db insert all table
        DB::connection();
        DB::beginTransaction();
        //check validation
        $this->validate($request, [
            'interview_date' => 'required',
            'expire_date'    => 'required',
            'hospital'       => 'required',
            'interview_code' => 'required',
            'g_patient'      => 'required',
            'g_age'          => 'required',
            'g_sex'          => 'required',
            'g_phone'        => 'required',
            'g_province'     => 'required',
            'g_local_village'=> 'required',

            //step2
            'nick_name'              => 'required',
            'nick_name.*'            => 'required',
            'dob'                    => 'required',
            'dob.*'                  => 'required',
            'age'                    => 'required',
            'age.*'                  => 'required',
            'family_relationship'    => 'required',
            'family_relationship.*'  => 'required',
            'occupation'             => 'required',
            'occupation.*'           => 'required',
            'education_level'        => 'required',
            'education_level.*'      => 'required',

        ],//customer message
        [
            'nick_name.*.required'           => 'The member name is required.',
            'dob.*.required'                 => 'The date of birth is required.',
            'age.*.required'                 => 'The age is required.',
            'family_relationship.*.required' => 'The relationship is required.',
            'occupation.*.required'          => 'The occupation is required.',
            'education_level.*.required'     => 'The education is required.'
        ]);

        try {

            //check od
            $od_code = $request->hospital;
            $query = Helpers::getInterviewCode($od_code);
            $check = DB::select("SELECT count(*) as id FROM general_information gi where gi.od_code=".$od_code);
            $check_code= $check[0]->id + 1;
            $interview_code= $query[0]->shortcut.'/'.date('ymd').'/0'.$check_code;
            //step 1
            // table general_information
            $data = array(
                'user_id'            => auth::user()->id,
                'od_code'            => $od_code,
                'hf_code'            => $request->hf_code,
                'interview_code'     => $interview_code,
                'hhid'               => $request->hhid,
                'printcardno'        => $request->printcardno,
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
                'interview_date'      => $request->interview_date,
                'expire_date'         => $request->expire_date,
            );
            $gn_info = GeneralInformationModel::create($data);



            //step2
            //table member_family
           foreach ($request->nick_name as $key => $val){
               $member_family = array(
                   'g_information_id'        => $gn_info->id,
                   'nick_name'               => $val,
                   'gender_id'               => $request->m_sex[$key],
                   'dob'                     => $request->dob[$key],
                   'age'                     => $request->age[$key],
                   'family_relationship_id'  => $request->family_relationship[$key],
                   'occupation_id'           => $request->occupation[$key],
                   'education_level_id'      => $request->education_level[$key],
               );
               MemberFamilyModel::create($member_family);
           }


            //step 3
            // table general_situation_family
            $general_situation_family = array(
                'g_information_id'     =>$gn_info->id,
                'household_family_id'  =>$request->household_family_id,
                'total_people'         =>$request->total_people,
                'toilet_id'            =>$request->tolet,
                'q_electric_id'        =>$request->q_electric,
                'transport_id'         =>$request->go_hospital,
                'land_agricultural_id' =>$request->land,
                'other_income'         => $request->income_agricalture_type,
                'debt_family_id'       =>$request->family_debt_id,
                'command'              =>$request->command
            );
            GeneralSituationFamilyModel::create($general_situation_family);

            //table household_root_link
            $household_link = $request->household_family_id;
            if($household_link == 1 || $household_link == 3){
                $hlink1 = array(
                    'household_family_id' =>$household_link,
                    'g_information_id'    =>$gn_info->id,
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
                    'h_build_year'        =>$request->h_build_year,
                    'home_prepare_id'     =>$request->home_prepare,
                    'roof_made_id'        =>$request->roof_made,
                    'roof_status_id'      =>$request->roof_status,
                    'walls_made_id'       =>$request->walls_made,
                    'walls_status_id'     =>$request->walls_status,
                    'condition_house_id'  =>$request->condition_house
                );
                HouseHoldRootLinkModel::create($hlink1);

                //home_prepar_link
                $homepre = $request->home_prepare;
                if($homepre == 2){
                    $hlink1_1 = array(
                        'g_information_id'  => $gn_info->id,
                        'home_prepar_id'    => $homepre,
                        'home_year'         => $request->home_year
                    );
                   DB::table('home_prepar_link')->insert($hlink1_1);
                }

            }elseif($household_link == 2){
                //household_rent_price_link
                $hlink2 = array(
                    'household_family_id' =>$household_link,
                    'g_information_id'    =>$gn_info->id,
                    'house_rent_price'    =>$request->rent_fee
                );
                HouseholdRentPriceModel::create($hlink2);
            }elseif($household_link == 5){
                //household_family_link
                $hlink = array(
                    'household_family_id' =>$household_link,
                    'g_information_id'    =>$gn_info->id,
                    'institutions_name'   =>$request->institutions_name,
                    'instatutions_phone'  =>$request->instatutions_phone
                    );
                HouseHoldFamilyLinkModel::create($hlink);
            }



            //table household_consumer
            foreach ($request->type_meterial as $key => $val) {
                $meterial = array(
                    'g_information_id'      => $gn_info->id,
                    'type_meterial_id'      => $val,
                    'number_meterial'       => $request->number_meterial[$key],
                    'market_value_meterial' => $request->market_value_meterial[$key],
                    'total_rail'            => $request->total_rail_meterial[$key],
                    'total_meterial_costs'  => $request->total_meterial_costs
                );
                HouseoldConsumerModel::create($meterial);
            }

            //toilet
            $q_toilet= $request->tolet;
            if($q_toilet == 1){
                //table type_toilet_link
                $qt = array(
                    'toilet_id'        =>$q_toilet,
                    'g_information_id' =>$gn_info->id,
                    'toilet_1'         =>$request->tolet_1,
                    'toilet_2'         =>$request->tolet_2
                );
                TypeToiletLinkModel::create($qt);
            }

            //electric
            $q_electric = $request->q_electric;
            if($q_electric == 1){
                //table yes_electric_link
                $e = array(
                    'q_electric_id'        =>$q_electric,
                    'g_information_id'     =>$gn_info->id,
                    'costs_in_hour'        =>$request->costs_in_hour,
                    'number_in_month'      =>$request->number_in_month,
                    'costs_per_month'      =>$request->costs_per_month,
                );
                YesElectricLinkModel::create($e);
            }elseif($q_electric == 2){
                //table no_electric_link
                $e1 = array(
                    'q_electric_id'       =>$q_electric,
                    'g_information_id'    =>$gn_info->id,
                    'electric_grid_id'    =>$request->electric_grid_id
                );
                NoElectricLinkModel::create($e1);
            }

            //table household_vehicle
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

            //table type_income
            foreach ($request->type_animals as $key => $anim) {
                $animals = array(
                    'g_information_id'      => $gn_info->id,
                    'type_animals_id'       => $anim,
                    'num_animals'           => isset($request->num_animals[$key]) ? $request->num_animals[$key] : 0,
                    'num_animals_big'       => isset($request->num_animals_big[$key]) ? $request->num_animals_big[$key] : 0,
                    'num_animals_small'     => isset($request->num_animals_small[$key]) ? $request->num_animals_small[$key] : 0,
                    'note_animals'          => $request->note_animals[$key],
                    'total_animals_costs'   => $request->total_animals_costs
                );
                TypeIncomeModel::create($animals);
            }



            //table land_agricultural_link
            if(!empty($request->land_2)) {
                $land_agricultural_other = array(
                    'g_information_id'     => $gn_info->id,
                    'land_agricultural_id' => $request->land_2,
                    'land_name'            => $request->land_name_other_2,
                    'total_land'           => $request->total_land_other_2,
                    'land_farm'            => $request->land_farm_other_2,
                    'total_land_farm'      => $request->total_land_farm_other_2,
                    'sum_land_farm'        => $request->sum_land_farm_other_2
                );
                LandOtherAgriculturalLinkModel::create($land_agricultural_other);
            }



            //table land_agricultural_link
            if(!empty($request->land_3)) {
                $land_agricultural = array(
                    'g_information_id'     => $gn_info->id,
                    'land_agricultural_id' => $request->land_3,
                    'p_land_name'          => $request->p_land_name,
                    'p_total_land'         => $request->p_total_land,
                    'p_land_farm'          => $request->p_land_farm,
                    'p_total_land_farm'    => $request->p_total_land_farm,
                    'p_sum_land_farm'      => $request->p_sum_land_farm,
                );
                LandAgriculturalLinkModel::create($land_agricultural);
            }



            //table other_income
            if($request->income_agricalture_type == 1) {
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
                        'total_mon_income'  => $request->total_mon_income,
                        'total_inc_person'  => $request->total_inc_person,
                    );
                    OtherIncomeModel::create($other_income);
                }
            }
            if($request->income_agricalture_type == 2) {
                foreach ($request->income_name_not as $key => $in) {
                    $other_income = array(
                        'g_information_id' => $gn_info->id,
                        'income_name_not' => $in,
                        'income_age_not' => $request->income_age_not[$key],
                        'income_occupation_not' => $request->income_occupation_not[$key],
                        'income_unit_not' => $request->income_unit_not[$key],
                        'unit_in_month_not' => $request->unit_in_month_not[$key],
                        'average_amount_not' => $request->average_amount_not[$key],
                        'monthly_income_not' => $request->monthly_income_not[$key],
                        'total_mon_income_not' => $request->total_mon_income_not,
                        'total_inc_person_not' => $request->total_inc_person_not,
                    );
                    OtherIncomeNotAgricultureModel::create($other_income);
                }
            }

            //table health_and_disability
            if(!empty($request->health_id)) {
                foreach ($request->health_id as $key1 => $he1) {
                    $health = array(
                        'g_information_id' => $gn_info->id,
                        'health_id' => $he1,
                        'kids_then65' => $request->kids_then65,
                        'old_bigger65' => $request->old_bigger65,
                        'kids_50_then65' => $request->kids_50_then65,
                        'old_50_bigger65' => $request->old_50_bigger65,
                    );
                        HealthDisabilityModle::create($health);
                }
            }


            //table debt_loan_link
            $debt = array(
                'g_information_id' => $gn_info->id,
                'loan_id'               => $request->family_debt_id,
                'question_id'           => $request->q_debt,
                'total_debt'            => $request->total_debt,
                'debt_duration'         => $request->debt_duration,
            );
            DebtLoanLinkModel::create($debt);
            
            //tabel score
            $total = $request->size_member_score + $request->toilet_score + $request->roof_score + $request->wall_score + $request->house_score + $request->price_rent_house_score + $request->price_electronic_score + $request->use_energy_elect_score + $request->no_energy_elect_score + $request->vehicle_score + $request->animal_score + $request->personal_farm_score + $request->other_farm_score + $request->income_out_farmer_score + $request->income_out_not_farmer_score + $request->income_child_score + $request->disease_score + $request->debt_score + $request->edu_score + $request->age_action_score;
            $score = array(
                'patient' => $gn_info->id,
                'size_member'   =>$request->size_member_score,
                'toilet'        => $request->toilet_score,
                'roof'          => $request->roof_score,
                'wall'          => $request->wall_score,
                'house_status'  => $request->house_score,
                'price_rent_house' => $request->price_rent_house_score,
                'price_electronic' => $request->price_electronic_score,
                'use_energy_elect' => $request->use_energy_elect_score,
                'no_energy_elect'  => $request->no_energy_elect_score,
                'vehicle'          => $request->vehicle_score,
                'animal'                => $request->animal_score,
                'personal_farm'         => $request->personal_farm_score,
                'other_farm'            => $request->other_farm_score,
                'income_out_farmer'     => $request->income_out_farmer_score,
                'income_out_not_farmer' => $request->income_out_not_farmer_score,
                'income_child'          => $request->income_child_score,
                'disease'               => $request->disease_score,
                'debt'                  => $request->debt_score,
                'edu'                   => $request->edu_score,
                'age_action'            => $request->age_action_score,
                'total'                 => $total
            );

            $score = StoreScoreModel::create($score);
            $total_score = $score->total;
            //echo $total_score;

            $poor = 0;
            if($total_score <= 42){
                $poor = 3;
            }elseif(($total_score > 42) && ($total_score < 85) ){
                $poor = 2;
            }elseif($total_score >= 85){
                $poor = 1;
            }
            //echo $poor;

            $shp_household_pmrs = array(
                'hhid'          =>$request->hhid,
                'province'      =>$request->g_province,
                'district'      =>$request->g_district,
                'commune'       =>$request->g_commune,
                'village'       =>$request->g_village,
                'location'      =>$request->g_local_village,
                'printedcardno' =>$request->printcardno,
                'roundnum'      =>0,
                'interviewscore'=>$total_score,
                'interviewdate' =>$request->interview_date,
                'expirydate'    =>$request->expire_date,
                'entryby'       =>auth::user()->id,
                'entrydate'     =>Carbon::now(),
                'poorcategory'  =>$poor
            );
           $shp= ShpHouseholdsModel::create($shp_household_pmrs);

            DB::commit();
            return Redirect::back()->with('success','បញ្ចូលទិន្នន័យជោគជ័យ');
        } catch (\Exception $e) {
            DB::rollBack();
           // return $this->errorResponse($e->getMessage(), 203);
            return Redirect::back()->with('danger','មិនអាចរក្សាទុកទិន្នន័យនៃការសម្ភាសន៍បានទេ');
        }

    }

    /*
     * by pheaktra
     * function edit
     */
    public function edit($id){
        $id = Crypt::decrypt($id);

        $hospital         = Helpers::getHospital();
        $provinces        = Helpers::getProvince();
        $relationship     = RelationshipModel::all();
        $gender           = Helpers::getGender();
        $household        = Helpers::getHouseHoldFamily();
        $homePrepar       = Helpers::getHomePrepar();
        $condition_house  = Helpers::getConditionHouse();
        $question         = Helpers::getQuestion();
        $electricgrid     = Helpers::getElectricGird();
        $landAgricultural = Helpers::getLangAgricultural();
        $loan             = Helpers::getLoan();
        $family           = Helpers::getFamilyRelation();
        $occupation       = Helpers::getOccupation();
        $education_level  = Helpers::getEducationLevel();
        $roof_made        = Helpers::getRoofmade();
        $wall_made        = Helpers::getWallmade();
        $house_status     = ConditionhouseModel::all();
        $typemeterial      = Helpers::getTypeMeterial();
        $typeanimals       = Helpers::getTypeAnimals();
        $typetransport     = Helpers::getTypeTransportation();
        $question_electric = Helpers::getQuestionElectric();
        $question_totel    = Helpers::getQuestionTolet();
        $health            = Helpers::getHealth();
        //step 1 general information
        $ginfo             = GeneralInformationModel::with('district','commune','village')->findOrFail($id);
        //step 2 member family
        $memberFamily      = MemberFamilyModel::with('generalInfo')->where('g_information_id',$id)->get();
        //step 3 general situation of the family
        $gFamily           = GeneralSituationFamilyModel::where('g_information_id',$id)->first();
        //household of the family
        $household_root    = HouseHoldRootLinkModel::where('household_family_id',$gFamily->household_family_id)
                            ->where('g_information_id',$id)
                            ->first();
        //personal home
        $household_root_yourself = HouseHoldRootLinkModel::where('household_family_id', 1)
            ->where('g_information_id', $id)
            ->first();

        //Stay with them for free
        $household_root_rend = HouseHoldRootLinkModel::where('household_family_id', 3)
            ->where('g_information_id', $id)
            ->first();

        //echo json_encode($household_root_rend);exit();
        //check house building year
        if($household_root == null){
            $homePreparLink = '';
        }else{
            $homePreparLink = HomePreparLinkModel::where('home_prepar_id',$household_root->home_prepare_id)->where('g_information_id',$id)->first();
        }

        //$homePreparLink = HomePreparLinkModel::where('home_prepar_id',$household_root->home_prepare_id)->where('g_information_id',$id)->first();
       // echo json_encode($household_root); exit();
        $rendPrice = HouseholdRentPriceModel::where('g_information_id',$id)->where('household_family_id',$gFamily->household_family_id)->first();
        $institutions = HouseHoldFamilyLinkModel::where('g_information_id',$id)->where('household_family_id',$gFamily->household_family_id)->first();
        $toilet    = TypeToiletLinkModel::where('toilet_id',$gFamily->toilet_id)->where('g_information_id',$id)->first();
       // $material  = HouseoldConsumerModel::where('g_information_id',$id)->first();

        $material          = HouseoldConsumerModel::with('typemeterial')->where('g_information_id',$id)->get();
        $yesElectrict      = YesElectricLinkModel::where('g_information_id',$id)->where('q_electric_id',$gFamily->q_electric_id)->first();
        $noElectrict       = NoElectricLinkModel::where('g_information_id',$id)->where('q_electric_id',$gFamily->q_electric_id)->first();
        $vehicle           = HouseholdVehicleModel::where('g_information_id',$id)->get();
        $income            = TypeIncomeModel::where('g_information_id',$id)->get();
        $landAg            = LandAgriculturalLinkModel::where('g_information_id',$id)->where('land_agricultural_id',$gFamily->land_agricultural_id)->first();
        $land_2 = LandOtherAgriculturalLinkModel::where('g_information_id',$id)->where('land_agricultural_id',2)->first();
        $land_3 = LandAgriculturalLinkModel::where('g_information_id',$id)->where('land_agricultural_id',3)->first();
        //echo json_encode($lang_3);exit();
        $otherIncome       = OtherIncomeModel::where('g_information_id',$id)->get();
       // echo json_encode($otherIncome);exit();
        $healthLink        = DB::select("select * from health ht
                            left join (
                                select hl.g_information_id, hl.health_id, hl.kids_then65, hl.old_bigger65, hl.kids_50_then65, hl.old_50_bigger65
                                from health_link hl 
                                where hl.g_information_id='$id'
                            ) t on t.health_id = ht.id order by ht.id asc");//HealthDisabilityModle::leftJoin('health','id','health_id')->where('g_information_id',$id)->get();

       // dd($healthLink);
        $debt_link = DebtLoanLinkModel::where('g_information_id',$id)->first();
       // echo json_encode($ginfo);exit();

        return view('home-edit',compact('hospital','relationship',
            'provinces','gender','household',
            'homePrepar','condition_house','question','electricgrid',
            'landAgricultural','loan','family','occupation','education_level',
            'roof_made','wall_made','house_status',
            'question_electric','typemeterial','typeanimals',
            'typetransport','question_totel','health','ginfo','memberFamily',
            'gFamily','household_root','household_root_rend','household_root_yourself','homePreparLink','rendPrice','institutions','toilet',
            'material','yesElectrict','noElectrict','vehicle','income','landAg','land_2','land_3',
            'otherIncome','healthLink','debt_link'));
    }

    /*
     * by pheaktra
     * function upload
     */
    public function update($id,request $request){
        //check db insert all table
        DB::connection();
        DB::beginTransaction();
        $id = Crypt::decrypt($id);
        //check validation
        $this->validate($request, [
            'interview_date' => 'required',
            'expire_date'    => 'required',
            'hospital'       => 'required',
            'interview_code' => 'required',
            'g_patient'      => 'required',
            'g_age'          => 'required',
            'g_sex'          => 'required',
            'g_phone'        => 'required',
            'g_province'     => 'required',
            'g_local_village'=> 'required',

            //step2
            'nick_name'              => 'required',
            'nick_name.*'            => 'required',
            'dob'                    => 'required',
            'dob.*'                  => 'required',
            'age'                    => 'required',
            'age.*'                  => 'required',
            'family_relationship'    => 'required',
            'family_relationship.*'  => 'required',
            'occupation'             => 'required',
            'occupation.*'           => 'required',
            'education_level'        => 'required',
            'education_level.*'      => 'required',

        ],//customer message
            [
                'nick_name.*.required'           => 'The member name is required.',
                'dob.*.required'                 => 'The date of birth is required.',
                'age.*.required'                 => 'The age is required.',
                'family_relationship.*.required' => 'The relationship is required.',
                'occupation.*.required'          => 'The occupation is required.',
                'education_level.*.required'     => 'The education is required.'
            ]);

        //try {

            //check od
            $od_code = $request->hospital;
            $query = Helpers::getInterviewCode($od_code);
            $check = DB::select("SELECT count(*) as id FROM general_information gi where gi.od_code=".$od_code);
            $check_code= $check[0]->id + 1;
            $interview_code= $query[0]->shortcut.'/'.date('ymd').'/0'.$check_code;

            //step 1 general information
            $data = array(
                'user_id'            => auth::user()->id,
                //'od_code'            =>$od_code,
                //'interview_code'     =>$interview_code,
                //'od_code'            => $od_code,
                //'hf_code'            => $request->hf_code,
                //'interview_code'     => $interview_code,
                'hhid'               => $request->hhid,
                'printcardno'        => $request->printcardno,

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
                'inter_patient'         => $request->inter_patient,
                'inter_age'             => $request->inter_age,
                'inter_sex'             => $request->inter_sex,
                'inter_phone'           => $request->inter_phone,
                'inter_relationship_id' => $request->inter_relationship,
                //family
                'fa_patient'          => $request->fa_patient,
                'fa_age'              => $request->fa_age,
                'fa_sex'              => $request->fa_sex,
                'fa_phone'            => $request->fa_phone,
                'fa_relationship_id'  => $request->fa_relationship,
            );
            $gn_info = GeneralInformationModel::where('id',$id)->update($data);
            //step2 member family
            $member_family=[];
            foreach ($request->nick_name as $key => $val){
                $member_family[] = [
                    'g_information_id'        => $id,
                    'nick_name'               => $val,
                    'gender_id'               => $request->m_sex[$key],
                    'dob'                     => $request->dob[$key],
                    'age'                     => $request->age[$key],
                    'family_relationship_id'  => $request->family_relationship[$key],
                    'occupation_id'           => $request->occupation[$key],
                    'education_level_id'      => $request->education_level[$key],
                    'created_at'              => Carbon::now(),
                    'updated_at'              => Carbon::now()
                ];
            }
            MemberFamilyModel::where('g_information_id',$id)->delete();
            MemberFamilyModel::insert($member_family);
            //step 3 general situation of the family
            $general_situation_family = array(
                'g_information_id'     => $id,
                'household_family_id'  => $request->household_family_id,
                'total_people'         => $request->total_people,
                'toilet_id'            => $request->tolet,
                'q_electric_id'        => $request->q_electric,
                'transport_id'         => $request->go_hospital,
                'land_agricultural_id' => $request->land,
                'debt_family_id'       => $request->family_debt_id,
                'command'              => $request->command
            );
            GeneralSituationFamilyModel::where('g_information_id',$id)->update($general_situation_family);
            //step 3
            if($request->household_family_id == 1 || $request->household_family_id == 3){
                $getHomePre = DB::table('home_prepar_link')
                    ->where('g_information_id',$id)
                    ->where('home_prepar_id',$request->home_prepare)
                    ->get();
                if(count($getHomePre) > 0){
                    if($request->home_prepare == 2){
                        $homePrepare = array(
                            'g_information_id'  => $id,
                            'home_prepar_id'    => $request->home_prepare,
                            'home_year'         => $request->home_year
                        );
                        DB::table('home_prepar_link')
                            ->where('g_information_id',$id)
                            ->where('home_prepar_id',$request->home_prepare)
                            ->update($homePrepare);
                    }
                }else{
                    if($request->home_prepare == 2){
                        $homePrepare = array(
                            'g_information_id'  => $id,
                            'home_prepar_id'    => $request->home_prepare,
                            'home_year'         => $request->home_year
                        );
                        DB::table('home_prepar_link')->insert($homePrepare);
                    }
                }


                $getHouse = HouseHoldRootLinkModel::where('g_information_id',$id)
                    ->where('household_family_id',$request->household_family_id)
                    ->first();
                if(count($getHouse) > 0){
                    $personal_home = array(
                        'household_family_id'  => $request->household_family_id,
                        'g_information_id'     => $id,
                        'ground_floor_length'  => $request->ground_floor_length,
                        'ground_floor_width'   => $request->ground_floor_width,
                        'ground_floor_area'    => $request->ground_floor_area,
                        'upper_floor_length'   => $request->upper_floor_length,
                        'upper_floor_width'    => $request->upper_floor_width,
                        'upper_floor_area'     => $request->upper_floor_area,
                        'further_floor_length' => $request->further_floor_length,
                        'further_floor_width'  => $request->further_floor_width,
                        'further_floor_area'   => $request->further_floor_area,
                        'total_area'           => $request->total_area,
                        'h_build_year'         => $request->h_build_year,
                        'home_prepare_id'      => $request->home_prepare,
                        'roof_made_id'         => $request->roof_made,
                        'roof_status_id'       => $request->roof_status,
                        'walls_made_id'        => $request->walls_made,
                        'walls_status_id'      => $request->walls_status,
                        'condition_house_id'   => $request->condition_house
                    );
                    HouseHoldRootLinkModel::where('g_information_id',$id)
                        ->where('household_family_id',$request->household_family_id)
                        ->update($personal_home);
                }else{
                    $personal_home = array(
                        'household_family_id'  => $request->household_family_id,
                        'g_information_id'     => $id,
                        'ground_floor_length'  => $request->ground_floor_length,
                        'ground_floor_width'   => $request->ground_floor_width,
                        'ground_floor_area'    => $request->ground_floor_area,
                        'upper_floor_length'   => $request->upper_floor_length,
                        'upper_floor_width'    => $request->upper_floor_width,
                        'upper_floor_area'     => $request->upper_floor_area,
                        'further_floor_length' => $request->further_floor_length,
                        'further_floor_width'  => $request->further_floor_width,
                        'further_floor_area'   => $request->further_floor_area,
                        'total_area'           => $request->total_area,
                        'h_build_year'         => $request->h_build_year,
                        'home_prepare_id'      => $request->home_prepare,
                        'roof_made_id'         => $request->roof_made,
                        'roof_status_id'       => $request->roof_status,
                        'walls_made_id'        => $request->walls_made,
                        'walls_status_id'      => $request->walls_status,
                        'condition_house_id'   => $request->condition_house
                    );
                    HouseHoldRootLinkModel::create($personal_home);
                }


            }elseif($request->household_family_id == 2){
                $getHouseRend = HouseholdRentPriceModel::where('g_information_id',$id)
                    ->where('household_family_id',$request->household_family_id)
                    ->first();
                if(count($getHouseRend) > 0) {
                    $houseForRend = array(
                        'household_family_id' => $request->household_family_id,
                        'g_information_id' => $id,
                        'house_rent_price' => $request->rent_fee
                    );
                    HouseholdRentPriceModel::where('g_information_id', $id)
                        ->where('household_family_id', $request->household_family_id)
                        ->update($houseForRend);
                }else{
                    $houseForRend = array(
                        'household_family_id' => $request->household_family_id,
                        'g_information_id' => $id,
                        'house_rent_price' => $request->rent_fee
                    );
                    HouseholdRentPriceModel::create($houseForRend);
                }

            }elseif($request->household_family_id == 5){
                $stay_instatution = array(
                    'household_family_id' => $request->household_family_id,
                    'g_information_id'    => $id,
                    'institutions_name'   => $request->institutions_name,
                    'instatutions_phone'  => $request->instatutions_phone
                );
                HouseHoldFamilyLinkModel::where('g_information_id',$id)
                    ->where('household_family_id',$request->household_family_id)
                    ->update($stay_instatution);
            }

            //step3 toilet
            $getToilet = TypeToiletLinkModel::where('g_information_id',$id)
                ->where('toilet_id',$request->tolet)
                ->first();
            if(count($getToilet) > 0){
                if($request->tolet == 1){
                    //table type_toilet_link
                    $qt = array(
                        'toilet_id'        =>$request->tolet,
                        'g_information_id' =>$id,
                        'toilet_1'         =>$request->tolet_1,
                        'toilet_2'         =>$request->tolet_2
                    );
                    TypeToiletLinkModel::where('g_information_id',$id)
                        ->where('toilet_id',$request->tolet)
                        ->update($qt);
                }
            }else{
                $qt = array(
                    'toilet_id'        =>$request->tolet,
                    'g_information_id' =>$id,
                    'toilet_1'         =>$request->tolet_1,
                    'toilet_2'         =>$request->tolet_2
                );
                TypeToiletLinkModel::create($qt);
            }

        //table household_consumer
        $meterial=[];
        foreach ($request->type_meterial as $key => $val) {
            $meterial[] = array(
                'g_information_id'      => $id,
                'type_meterial_id'      => $val,
                'number_meterial'       => $request->number_meterial[$key],
                'market_value_meterial' => $request->market_value_meterial[$key],
                'total_rail'            => $request->total_rail_meterial[$key],
                'total_meterial_costs'  => $request->total_meterial_costs,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            );
        }
     //   echo $id;exit();
        HouseoldConsumerModel::where('g_information_id',$id)->delete();
        HouseoldConsumerModel::insert($meterial);


        //electric
        $q_electric = $request->q_electric;
        if($q_electric == 1){
            //table yes_electric_link
            $e = array(
                'q_electric_id'        =>$q_electric,
                'g_information_id'     =>$id,
                'costs_in_hour'        =>$request->costs_in_hour,
                'number_in_month'      =>$request->number_in_month,
                'costs_per_month'      =>$request->costs_per_month,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            );
            YesElectricLinkModel::where('g_information_id',$id)->delete();
            YesElectricLinkModel::insert($e);
        }elseif($q_electric == 2){
            //table no_electric_link
            $e1 = array(
                'q_electric_id'       =>$q_electric,
                'g_information_id'    =>$id,
                'electric_grid_id'    =>$request->electric_grid_id,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            );
            NoElectricLinkModel::where('g_information_id',$id)->delete();
            NoElectricLinkModel::insert($e1);
        }



        //table household_vehicle
        $vehicle=[];
        foreach ($request->type_vehicle as $key => $vi) {
            $vehicle[] = array(
                'g_information_id'     => $id,
                'type_vehicle_id'      => $vi,
                'number_vehicle'       => $request->number_vehicle[$key],
                'market_value_vehicle' => $request->market_value_vehicle[$key],
                'total_rail_vehicle'   => $request->total_rail_vehicle[$key],
                'total_vehicle_costs'  => $request->total_vehicle_costs,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            );
            HouseholdVehicleModel::create($vehicle);
        }

        HouseholdVehicleModel::where('g_information_id',$id)->delete();
        HouseholdVehicleModel::insert($vehicle);



        //table type_income
        $animals =[];
        foreach ($request->type_animals as $key => $anim) {
            $animals[] = array(
                'g_information_id'      => $id,
                'type_animals_id'       => $anim,
                'num_animals'           => isset($request->num_animals[$key]) ? $request->num_animals[$key] : 0,
                'num_animals_big'       => isset($request->num_animals_big[$key]) ? $request->num_animals_big[$key] : 0,
                'num_animals_small'     => isset($request->num_animals_small[$key]) ? $request->num_animals_small[$key] : 0,
                'note_animals'          => $request->note_animals[$key],
                'total_animals_costs'   => $request->total_animals_costs,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            );
        }
        TypeIncomeModel::where('g_information_id',$id)->delete();
        TypeIncomeModel::insert($animals);


        //table health_and_disability
        $health =[];
        HealthDisabilityModle::where('g_information_id',$id)->delete();
        if(!empty($request->health_id)) {
            foreach ($request->health_id as $key1 => $he1) {
                $health[] = array(
                    'g_information_id' => $id,
                    'health_id'        => $he1,
                    'kids_then65'      => $request->kids_then65,
                    'old_bigger65'     => $request->old_bigger65,
                    'kids_50_then65'   => $request->kids_50_then65,
                    'old_50_bigger65'  => $request->old_50_bigger65,
                    'created_at'            => Carbon::now(),
                    'updated_at'            => Carbon::now()
                );
            }
            HealthDisabilityModle::insert($health);
        }



        //table debt_loan_link
        $debt = array(
            'g_information_id'      => $id,
            'loan_id'               => $request->family_debt_id,
            'question_id'           => $request->q_debt,
            'total_debt'            => $request->total_debt,
            'debt_duration'         => $request->debt_duration,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now()
        );
        DebtLoanLinkModel::where('g_information_id',$id)->update($debt);


        //  echo json_encode($member_family);
           // DB::commit();
            return Redirect::back()->with('success','ការសម្ភាសទិន្នន័យត្រូវបានធ្វើបច្ចុប្បន្នភាពដោយជោគជ័យ');
//        } catch (\Exception $e) {
//            DB::rollBack();
//            return Redirect::back()->with('danger','មិនអាចរក្សាទុកទិន្នន័យនៃការសម្ភាសន៍បានទេ');
//        }
    }


    /*
     * by pheaktra
     * function upload
     */
    public function delete($id){
        //check db insert all table
        DB::connection();
        DB::beginTransaction();
        $id = Crypt::decrypt($id);
        try {
            $ginfo = GeneralInformationModel::findOrFail($id);
            $ginfo->record_status = 0;
            $ginfo->save();
            DB::commit();
            return Redirect::back()->with('success','លុបទិន្នន័យជោគជ័យ');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with('danger','លុបទិន្នន័យមិនបានជោគជ័យ');
        }
    }

}

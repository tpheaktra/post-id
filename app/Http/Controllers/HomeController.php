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
use App\model\MemberFamilyModel;
use App\model\NoElectricLinkModel;
use App\model\OtherIncomeModel;
use App\model\TypeIncomeModel;
use App\model\TypeToiletLinkModel;
use App\model\YesElectricLinkModel;
use Illuminate\Http\Request;
use App\model\RelationshipModel;
use App\model\FamilyrelationModel;
use App\Helpers\Helpers;
use App\model\ConditionhouseModel;
use App\model\WallMadeModel;
use App\model\RoofMadeModel;
use Illuminate\Support\Facades\Redirect;
use DB;
use auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
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

//    function getOD1(request $request,$code=2,$od_name='Battambang'){
//        $od = Helpers::getOD($code,$od_name);
//        return $od[0]->shortcut;
//    }

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
        return view('home',compact('hospital','relationship',
            'provinces','gender','household',
            'homePrepar','condition_house','question','electricgrid',
            'landAgricultural','loan','family','occupation','education_level',
            'landAgricultural','loan','family','roof_made','wall_made','house_status',
            'question_electric','typemeterial','typeanimals',
            'typetransport','question_totel','health'));
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
         $score= DB::select('select *from general_information gi left join store_score sc on sc.patient = gi.id

where gi.id = 1');
        $gender = Helpers::getGender();
        return view('view',compact('gender','patient'));
    }



    public function print($id){
        $id = Crypt::decrypt($id);
        $patient = DB::select("select
            gi.id,gi.interview_code,gi.g_patient,gi.g_age,gg.name_kh,gi.g_patient,gi.g_phone,
            gi.inter_patient,gi.inter_age,inter.name_kh as inter_sex,gi.inter_phone,rp.name_kh as inter_relationship,
            gi.fa_patient,gi.fa_age,fa.name_kh as fa_sex,gi.fa_phone,fr.name_kh as fa_relationship,
            gi.g_local_village as g_local_village, 
            p.name_kh as province, d.name_kh as district,c.name_kh as commune, v.name_kh as village
            from general_information gi
            inner join member_family mf on gi.id = mf.g_information_id
            inner join general_situation_family gsf on gi.id = gsf.g_information_id 
            inner join gender gg on gi.g_sex = gg.id
            inner join dev_pmrs_share.provinces p on gi.g_province_id = p.code
            inner join dev_pmrs_share.districts d on gi.g_district_id = d.code
            inner join dev_pmrs_share.communes c on gi.g_commune_id = c.code
            inner join dev_pmrs_share.villages v on gi.g_village_id = v.code
            #interview
            inner join relationship rp on gi.inter_relationship_id = rp.id
            inner join gender inter on gi.inter_sex = inter.id
            #family
            inner join family_relation fr on gi.fa_relationship_id = fr.id
            inner join gender fa on gi.fa_sex = fa.id
            where gi.id = '$id'
            group by gi.id");
        $khor = DB::select("select gi.id,
            mff.nick_name,
            mff.dob,
            mff.age,
            mff.dob,
            rmp.name_kh as m_relationship,
            oc.name_kh as m_occupation,
            el.name_kh as m_education
            from general_information gi
            inner join member_family mff on gi.id = mff.g_information_id
            inner join relationship rmp on mff.family_relationship_id = rmp.id
            inner join occupation oc on mff.occupation_id = oc.id
            inner join education_level el on mff.education_level_id = el.id
            where gi.id = '$id'");
        $kur_step1 = DB::select("select gi.id,
            gf.total_people,
            qt.name_kh as toilet,
            qe.name_kh as electric,
            tt.name_kh as transport,
            af.ground_floor_length,
            af.ground_floor_width,
            af.ground_floor_area,
            af.upper_floor_length,
            af.upper_floor_width,
            af.upper_floor_area,
            af.further_floor_length,
            af.further_floor_width,
            af.further_floor_area
            from general_situation_family gf inner join general_information gi on gi.id = gf.g_information_id
            inner join area_family_house af on gf.g_information_id = af.id
            inner join question_totel qt on gf.toilet_id = qt.id
            inner join question_electric qe on gf.q_electric_id = qe.id
            inner join type_transportation tt on gf.transport_id = tt.id
            where gi.id = '$id' ");
        return view('print',compact('patient','khor','kur_step1'));

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
            $view[$i]->key = $i+1;
            $view[$i]->view = route('view.data', Crypt::encrypt($v->id));
            $view[$i]->edit = route('editpatient.edit', Crypt::encrypt($v->id));
            $view[$i]->print = route('print.data', Crypt::encrypt($v->id));
            $view[$i]->delete = route('deletepatient.delete', Crypt::encrypt($v->id));
        }
        return Datatables::of($view)->make(true);
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
            'hospital'       => 'required',
            'interview_code' => 'required',
            'g_patient'      => 'required',
            'g_age'          => 'required',
            'g_sex'          => 'required',
            'g_phone'        => 'required',
            'g_province'         => 'required',
            'g_local_village'    => 'required',
            'inter_patient'      => 'required',
            'inter_age'          => 'required',
            'inter_sex'          => 'required',
            'inter_phone'        => 'required',
            'inter_relationship' => 'required',
            'fa_patient'           => 'required',
            'fa_age'               => 'required',
            'fa_sex'               => 'required',
            'fa_phone'             => 'required',
            'fa_relationship'      => 'required',
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
                $house=HouseHoldRootLinkModel::create($hlink1);

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

            // table general_situation_family
            $general_situation_family = array(
                'g_information_id'     =>$gn_info->id,
                'household_family_id'  =>$household_link,
                'total_people'         => $request->total_people,
                'toilet_id'            =>$request->tolet,
                'q_electric_id'        =>$request->q_electric,
                'transport_id'         =>$request->go_hospital,
                'land_agricultural_id' =>$request->land,
                'command'              =>$request->command
            );
            GeneralSituationFamilyModel::create($general_situation_family);

            //table household_consumer
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
                    'g_information_id'      =>  $gn_info->id,
                    'type_animals_id'       => $anim,
                    'num_animals_big'       => $request->num_animals_big[$key],
                    'num_animals_small'     => $request->num_animals_small[$key],
                    'note_animals'          => $request->note_animals[$key],
                    'total_animals_costs'   => $request->total_animals_costs
                );
                TypeIncomeModel::create($animals);
            }

            //table land_agricultural_link
            $land_agricultural = array(
                'g_information_id'     =>  $gn_info->id,
                'land_agricultural_id' => $request->land,
                'land_name'            => $request->land_name,
                'total_land'           => $request->total_land,
                'land_farm'            => $request->land_farm,
                'total_land_farm'      => $request->total_land_farm
            );
            LandAgriculturalLinkModel::create($land_agricultural);

            //table other_income
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

        $vehicle           = HouseholdVehicleModel::where('g_information_id',$id)->get();
        $income            = TypeIncomeModel::where('g_information_id',$id)->get();
        $otherIncome       = OtherIncomeModel::where('g_information_id',$id)->get();


       // echo json_encode($ginfo);exit();

        return view('edit',compact('hospital','relationship',
            'provinces','gender','household',
            'homePrepar','condition_house','question','electricgrid',
            'landAgricultural','loan','family','occupation','education_level',
            'landAgricultural','loan','family','roof_made','wall_made','house_status',
            'question_electric','typemeterial','typeanimals',
            'typetransport','question_totel','health','ginfo','memberFamily',
            'gFamily','household_root','homePreparLink','rendPrice','institutions','toilet',
            'material','vehicle','income','otherIncome'));
    }

    /*
     * by pheaktra
     * function updated
     */
    public function update($id,request $request){
        //check db insert all table
        DB::connection();
        DB::beginTransaction();
        $id = Crypt::decrypt($id);
        //check validation
        $this->validate($request, [
            'hospital'       => 'required',
            'interview_code' => 'required',
            'g_patient'      => 'required',
            'g_age'          => 'required',
            'g_sex'          => 'required',
            'g_phone'        => 'required',
            'g_province'         => 'required',
            'g_local_village'    => 'required',
            'inter_patient'      => 'required',
            'inter_age'          => 'required',
            'inter_sex'          => 'required',
            'inter_phone'        => 'required',
            'inter_relationship' => 'required',
            'fa_patient'           => 'required',
            'fa_age'               => 'required',
            'fa_sex'               => 'required',
            'fa_phone'             => 'required',
            'fa_relationship'      => 'required',
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
                //'od_code'            =>$od_code,
                //'interview_code'     =>$interview_code,
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
            $gn_info = GeneralInformationModel::where('id',$id)->update($data);
            //step2
            //table member_family
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
                ];
            }
            MemberFamilyModel::where('g_information_id',$id)->delete();
            MemberFamilyModel::insert($member_family);
            DB::commit();
            return Redirect::back()->with('success','ការសម្ភាសទិន្នន័យត្រូវបានធ្វើបច្ចុប្បន្នភាពដោយជោគជ័យ');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with('danger','មិនអាចរក្សាទុកទិន្នន័យនៃការសម្ភាសន៍បានទេ');
        }
    }


    /*
     * by pheaktra
     * function updated
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

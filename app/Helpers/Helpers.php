<?php
	
namespace App\Helpers;
use App\model\UserHospital;
use App\User;
use DB;
class Helpers{
	/*
	* function get language
	*/
	public static function lang(){
		return \App::getLocale();
	}


    /*
    * function getProvince
    */
    public static function getHospital(){
        $hospital = DB::connection("mysql2")
            ->select('select hf.code as od_code,os.shortcut,hf.name_kh from operational_districts od 
                    inner join od_shortcuts os on od.code = os.od_code
                    inner join health_facilities hf on os.od_code = hf.od_code where hf.`type` in(4,5,6) and hf.`status` = 1 group by hf.name_kh');
        return $hospital;
    }

    /*
    * function getProvince
    */
    public static function getBase($uid){
//        $bs = DB::select('select * from `post-id`.users us
//inner join dev_pmrs_share.health_facilities hf
//on us.hos_base = hf.code where us.id = '.$uid);
        $bs = User::with('health_facilities')
            ->where('id',$uid);
        return $bs;
    }

    public static function getAllBase($uid){
        $allBase = UserHospital::with('user_hospital')
            ->where('user_id',$uid);
//        $allBase = DB::select('select uh.hospital_id,f.name_kh from `post-id`.user_hospital uh
//inner join dev_pmrs_share.health_facilities f on f.code=uh.hospital_id
//where uh.user_id='.$uid);
        return $allBase;
    }

    /*
    * function getInterviewCode
    */
    public static function getHealthFacilitiesCode($od_code,$hf_code){
        echo $hf_code;
        $interview = DB::connection("mysql2")
            ->select("select hf.code as hf_code from health_facilities hf inner join od_shortcuts os on hf.od_code = os.od_code where hf.code = '$od_code' and hf.name_kh = '$hf_code'");
        return $interview;
    }

    /*
    * function getInterviewCode
    */
    public static function getInterviewCode($od_code){
        $interview = DB::connection("mysql2")
            ->select("select os.shortcut,hf.code as hf_code from health_facilities hf inner join od_shortcuts os on hf.od_code = os.od_code where hf.code = '$od_code' limit 1");
        return $interview;
    }


	/*
	* function getProvince
	*/
	public static function getProvince(){
		$province = DB::connection("mysql2")->select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS province, name_kh , code from provinces where code != 25');
		return $province;
	}



    /*
    * function getDistrict
    */
    public static function getDistrict($pro){
        $province = DB::connection("mysql2")->select('select label,'.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS district, province_code ,name_kh, code from districts where province_code='.$pro);
        return $province;
    }

    /*
	* function getCommune
	*/
    public static function getCommune($dis){
        $province =  DB::connection("mysql2")->select('select label,'.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS commune, district_code ,name_kh, code from communes where district_code='.$dis);
        return $province;
    }



    /*
    * function getVillag
    */
	public static function getVillage($com){
		$province =DB::connection("mysql2")->select('select label,'.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS village, commune_code ,name_kh,code from villages where commune_code='.$com);
		return $province;
	}

	/*
	 * function print_nocard
	 */
	public static function getPrintNoCard($vil){
        $printcard =DB::connection("mysql3")->select('select max(h.printedcardno) as card from shp_households h where h.village ='.$vil);
        return $printcard;
    }

    /*
    * function get gender
    */
    public static function getGender(){
        $gender =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS gender ,name_kh,id from gender');
        return $gender;
    }

    /*
    * function get gender
    */
    public static function getHouseHoldFamily(){
        $household =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS household ,name_kh,id from household_family');
        return $household;
    }

    /*
    * function get gender
    */
    public static function getHomePrepar(){
        $homeprepar =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS homeprepar ,name_kh,id from home_prepar');
        return $homeprepar;
    }

    /*
    * function get gender
    */
    public static function getConditionHouse(){
        $homeprepar =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS conditionhouse ,name_kh,id from condition_house');
        return $homeprepar;
    }


    /*
    * function get gender
    */
    public static function getQuestion(){
        $homeprepar =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS question ,name_kh,id from question');
        return $homeprepar;
    }

    /*
   * function get gender
   */
    public static function getElectricGird(){
        $homeprepar =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS electricgrid ,name_kh,id from electric_grid');
        return $homeprepar;
    }

    /*
  * function get gender
  */
    public static function getLangAgricultural(){
        $homeprepar =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS land ,name_kh,id from land_agricultural');
        return $homeprepar;
    }


    /*
 * function get gender
 */
    public static function getLoan(){
        $loan =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS loan ,name_kh,id from loan');
        return $loan;
    }


     /*
 * function get getFamilyRelation
 */
    public static function getFamilyRelation(){
        $loan =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS familyrelation ,name_kh,id from family_relation');
        return $loan;
    }


    /*
    * function get gender
    */
        public static function getOccupation(){
            $loan =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS occupation ,name_kh,id from occupation');
            return $loan;
        }






    /* function get getRoofmade
 */
    public static function getRoofmade(){
        $roof =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS roof_made ,name_kh,id from roof_made');
        return $roof;
    }
    /* function get getwallfmade
 */
    public static function getWallmade(){
        $wall =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS wall_made ,name_kh,id from wall_made');
        return $wall;
    }


    /*
* function get gender
*/
    public static function getEducationLevel(){
        $loan =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS education ,name_kh,id from education_level');
        return $loan;
    }


    /*
* function get gender
*/
    public static function getQuestionElectric(){
        $loan =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS questionelectric ,name_kh,id from question_electric');
        return $loan;
    }


    /*
    * function get gender
    */
    public static function getTypeMeterial(){
        $tm = DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS meterial ,name_kh,id from type_meterial');
        return $tm;
    }


    /*
    * function get gender
    */
    public static function getTypeAnimals(){
        $tm = DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS animals ,name_kh,id from type_animals');
        return $tm;
    }


    /*
    * function get gender
    */
    public static function getTypeTransportation(){
        $tm = DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS transport ,name_kh,id from type_transportation');
        return $tm;
    }

    /*
    * function get gender
    */
    public static function getQuestionTolet(){
        $tm = DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS tolet ,name_kh,id from question_totel');
        return $tm;
    }


    /*
    * function get getHealth
    */
    public static function getHealth(){
        $tm = DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS health ,name_kh,id from health');
        return $tm;
    }


    /*
   * function getDistrict
   */
//    public static function getOD($code,$od_name){
//        $province = DB::connection("mysql2")
//            ->select("select os.shortcut from dev_pmrs_share.od_shortcuts os
//                    inner join dev_pmrs_share.operational_districts od on os.od_code = od.code
//                    where od.province_code='$code' and od.name_en = '$od_name'");
//        return $province;
//    }

}
	
	
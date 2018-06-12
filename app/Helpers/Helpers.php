<?php
	
namespace App\Helpers;
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
	public static function getProvince(){
		$province = DB::connection("mysql2")->select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS province, name_kh , code from provinces where code != 25');
		return $province;
	}



    /*
    * function getDistrict
    */
    public static function getDistrict($pro){
        $province = DB::connection("mysql2")->select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS district, province_code ,name_kh, code from districts where province_code='.$pro);
        return $province;
    }

    /*
	* function getCommune
	*/
    public static function getCommune($dis){
        $province =  DB::connection("mysql2")->select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS commune, district_code ,name_kh, code from communes where district_code='.$dis);
        return $province;
    }



    /*
    * function getVillag
    */
	public static function getVillage($com){
		$province =DB::connection("mysql2")->select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS village, commune_code ,name_kh,code from villages where commune_code='.$com);
		return $province;
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
 * function get gender
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

    /*
* function get gender
*/
    public static function getEducationLevel(){
        $loan =DB::select('select '.(Helpers::lang() == 'en' ? 'name_en' : 'name_kh').' AS education ,name_kh,id from education_level');
        return $loan;
    }


}
	
	
<?php
namespace App\Helpers;
use DB;

class PreIdRoundManager{

	protected $provinceCodes;
	protected $provinces;
	protected $roundNumber;
	protected $roundStartDate;
	protected $roundEndDate;
	protected $checkProvince;
	protected $checkPeriod;
	
	public function __construct($checkProvince, $checkPeriod) {
		$this->checkProvince = $checkProvince;
		$this->checkPeriod = $checkPeriod;
		$rounds = $this->getProvinceRounds();
		$rounds = $this->getCheckPeriodRounds($rounds);
		if(count($rounds) === 1) $this->setInfo(reset($rounds));
	}
		
	public function setInfo($round){
		$this->provinceCodes = $round['provinces'];
		$this->roundNumber = $round['round_number'];
		$this->roundStartDate = $round['start_date'];
		$this->roundEndDate = $round['end_date'];
	}
	
	public function getProvinceRounds($rounds = NULL){
		if($rounds === NULL) $rounds = self::getAllRounds();
		$existRounds = array();
		foreach($rounds as $roundNum=>$round){
			if(in_array($this->checkProvince, $round['provinces'])) $existRounds[$roundNum] = $round;
		}
		return $existRounds;
	}
	
	public function getCheckPeriodRounds($rounds = NULL){
		if($rounds === NULL) $rounds = self::getAllRounds();
		$existRounds = array();
		foreach($rounds as $roundNum=>$round){
			if(empty($round['start_date'])){
				if(strtotime($this->checkPeriod) <= strtotime($round['end_date'])) {
					$existRounds[$roundNum] = $round;
				}
			}else if(empty($round['end_date'])){
				if(strtotime($this->checkPeriod) >= strtotime($round['end_date'])) {
					$existRounds[$roundNum] = $round;
				}
			}else if(!empty($round['start_date']) && !empty($round['end_date'])){
				if(strtotime($this->checkPeriod) >= strtotime($round['start_date']) 
				&& strtotime($this->checkPeriod) <= strtotime($round['start_date']) ){
					$existRounds[$roundNum] = $round;
				}
					
			}
		}
		return $existRounds;
	}

	public function getPostExpireDate(){
        $rounds = $this->getProvinceRounds();
        $lastRound = end($rounds);
        return $lastRound['​post_expire_date'];
    }
	
	public static function getAllRounds(){
		$rounds = array(
			2 => array(
					'round_number' => 2,
					'provinces' => array(5, 7, 9, 11, 14, 18, 20, 23),
					'start_date' => '',
					'end_date' => '2013-06-30',
					'ref_household_table' => 'shp_households',
					'ref_member_table' => 'shp_members'
			),
			3 => array(
					'round_number' => 3,
					'provinces' => array(1, 3, 6, 10, 17, 19, 22, 26),
					'start_date' => '',
					'end_date' => '2014-02-28',
					'ref_household_table' => 'shp_households',
					'ref_member_table' => 'shp_members'
			),
				
			4 => array(
					'round_number' => 4,
					'provinces' => array(2, 4, 8, 13, 15, 21, 16, 24),
					'start_date' => '',
					'end_date' => '2014-09-30',
					'ref_household_table' => 'shp_households',
					'ref_member_table' => 'shp_members'
			),
			5 => array(
					'round_number' => 5,
					'provinces' => array(5, 7, 9, 11, 14, 18, 20, 23),
					'start_date' => '2013-07-01',
					'end_date' => '2015-08-31',
					'ref_household_table' => '',
					'ref_member_table' => ''
			),
				
			6 => array(
					'round_number' => 6,
					'provinces' => array(1, 3, 6, 10, 17, 19, 22, 26),
					'start_date' => '2014-03-01',
					'end_date' => '2016-09-30',
					'ref_household_table' => '',
					'ref_member_table' => ''
			),
			
			7 => array(
					'round_number' => 7,
					'provinces' => array(2, 4, 8, 13, 15, 21, 16, 24),
					'start_date' => '2014-10-01',
					'end_date' => '',
					'​post_expire_date' => '2017-12-31',
					'ref_household_table' => '',
					'ref_member_table' => ''
			),
			
			8 => array(
					'round_number' => 8,
					'provinces' => array(5, 7, 9, 11, 14, 18, 20, 23),
					'start_date' => '2015-09-01',
					'end_date' => '',
					'​post_expire_date' => '2018-12-31',
					'ref_household_table' => '',
					'ref_member_table' => ''
			),
			
			9 => array(
					'round_number' => 9,
					'provinces' => array(1, 3, 6, 10, 17, 19, 22, 26, 12),
					'start_date' => '2016-10-01',
					'end_date' => '',
					'​post_expire_date' => '2019-12-31',
					'ref_household_table' => '',
					'ref_member_table' => ''
			),

			10 => array(
					'round_number' => 10,
					'provinces' => array(2, 4, 8, 13, 15, 21, 16, 24),
					'start_date' => '',
					'end_date' => '',
					'​post_expire_date' => '2020-12-31',
					'ref_household_table' => '',
					'ref_member_table' => ''
			)

		);
		return $rounds;
	}
}

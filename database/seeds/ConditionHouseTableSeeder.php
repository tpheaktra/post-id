<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ConditionHouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $household = [
            [
                'name_en' => 'Degradation',
                'name_kh' => 'ទ្រុឌទ្រោម',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Medium',
                'name_kh' => 'មធ្យម',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Good',
                'name_kh' => 'ល្អ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('condition_house')->insert($household);
    }
}

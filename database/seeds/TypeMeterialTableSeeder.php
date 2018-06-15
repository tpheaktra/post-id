<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TypeMeterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tm = [
            [
                'name_en' => 'Mobile phones',
                'name_kh' => 'ទូរស័ព្ទដៃ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Electric fans',
                'name_kh' => 'កង្ហារ​អគ្គិសនី',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Radios',
                'name_kh' => 'វិទ្យុ ម៉ាញ៉េ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'TV',
                'name_kh' => 'ទូរទស្សន៍',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Pump or pumping pump',
                'name_kh' => 'ម៉ាស៊ីនបូមទឹក ឬម៉ូទ័របូមទឹក',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Other',
                'name_kh' => 'ឧបករណ៍ផ្សេងៗ(ទូទឹកកក………)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('type_meterial')->insert($tm);
    }
}

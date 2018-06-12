<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RoofMadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $relate = [
            [
            	'name_en' => 'parm_spring',
                'name_kh' => 'ស្លឹកត្នោត',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            	'name_en' => 'grass',
                'name_kh' => 'ស្បូវ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            	'name_en' => 'cu',
                'name_kh' => 'ស័ង្ហសី',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
            	'name_en' => 'tile',
                'name_kh' => 'ក្បឿង',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            	'name_en' => 'Other',
                'name_kh' => 'ផ្សេងៗ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ];
        DB::table('roof_made')->insert($relate);
    }
}

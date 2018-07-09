<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class WallMadeTableSeeder extends Seeder
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
            ],[
            	'name_en' => 'grass',
                'name_kh' => 'ស្បូវ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name_en' => 'bamboo',
                'name_kh' => 'ឬស្សី',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
            	'name_en' => 'cu',
                'name_kh' => 'ស័ង្ហសី',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
            	'name_en' => 'board',
                'name_kh' => 'ឈើ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name_en' => 'cement',
                'name_kh' => 'ឥដ្ឋ/ស៊ីម៉ង់ ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name_en' => 'no_wall',
                'name_kh' => 'គ្មានជញ្ជាំង',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
            	'name_en' => 'Other',
                'name_kh' => 'ផ្សេងៗ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ];
        DB::table('wall_made')->insert($relate);
    }
}

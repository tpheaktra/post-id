<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class OccupationTableSeeder extends Seeder
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
                'name_en' => 'Farmers',
                'name_kh' => 'កសិករ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Workers',
                'name_kh' => 'កម្មករ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Civil servants',
                'name_kh' => 'មន្រី្តរាជការ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Businessman',
                'name_kh' => 'អ្នករកស៊ី',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Student',
                'name_kh' => 'សិស្ស',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'At home',
                'name_kh' => 'នៅផ្ទះ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ];
        DB::table('occupation')->insert($household);
    }
}

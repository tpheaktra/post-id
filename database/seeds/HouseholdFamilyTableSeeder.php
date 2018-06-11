<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class HouseholdFamilyTableSeeder extends Seeder
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
                'name_en' => 'Personal home',
                'name_kh' => 'ផ្ទះផ្ទាល់ខ្លួន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Rent a house',
                'name_kh' => 'ជួលផ្ទះ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Stay with them for free',
                'name_kh' => 'ស្នាក់នៅជាមួយគេដោយអត់បង់ថ្លៃ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name_en' => 'Homeless',
                'name_kh' => 'គ្មានផ្ទះសម្បែង',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Accommodation in institution',
                'name_kh' => 'ស្នាក់នៅស្ថាប័ន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('household_family')->insert($household);
    }
}

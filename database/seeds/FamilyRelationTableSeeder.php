<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class FamilyRelationTableSeeder extends Seeder
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
            	'name_en' => 'Village chiefs',
                'name_kh' => 'មេភូមិ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            	'name_en' => 'Near house',
                'name_kh' => 'អ្នកជិតខាង',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            	'name_en' => 'friends',
                'name_kh' => 'មិត្តភ័ក្រ',
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
        DB::table('family_relation')->insert($relate);
    }
}

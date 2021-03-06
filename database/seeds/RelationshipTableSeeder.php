<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RelationshipTableSeeder extends Seeder
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
            	'name_en' => 'Husband',
                'name_kh' => 'ប្តី',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            	'name_en' => 'Wife',
                'name_kh' => 'ប្រពន្ធ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Children',
                'name_kh' => 'កូន',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            	'name_en' => 'Grandmonther',
                'name_kh' => 'ក្មួយ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grandmonther',
                'name_kh' => 'អ៊ុំ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grandmonther',
                'name_kh' => 'បង/ប្អូន ',
                'record_status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grandmother / Grandfather',
                'name_kh' => 'ជីដូន/ជីតា',
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
        DB::table('relationship')->insert($relate);
    }
}

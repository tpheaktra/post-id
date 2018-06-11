<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class LandAgriculturalTableSeeder extends Seeder
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
                'name_en' => 'No rental',
                'name_kh' => 'គ្មាន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Land for rent',
                'name_kh' => 'ដីជួលគេ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Personal land',
                'name_kh' => 'ដីផ្ទាល់ខ្លួន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('land_agricultural')->insert($relate);
    }
}

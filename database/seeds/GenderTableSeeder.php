<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ge = [
            [
                'name_en' => 'Male',
                'name_kh' => 'ប្រុស',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Female',
                'name_kh' => 'ស្រី',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('gender')->insert($ge);
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class HomePreparTableSeeder extends Seeder
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
                'name_en' => 'No',
                'name_kh' => 'មិនបាន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Yes',
                'name_kh' => 'បាន នៅឆ្នាំ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('home_prepar')->insert($relate);
    }
}

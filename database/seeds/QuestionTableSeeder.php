<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class QuestionTableSeeder extends Seeder
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
                'name_en' => 'Yes',
                'name_kh' => 'បាន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'No',
                'name_kh' => 'មិនបាន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('question')->insert($household);
    }
}

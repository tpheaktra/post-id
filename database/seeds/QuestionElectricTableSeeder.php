<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class QuestionElectricTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qe = [
            [
                'name_en' => 'Yes',
                'name_kh' => 'បានត',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'No',
                'name_kh' => 'មិនបានត',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('question_electric')->insert($qe);
    }
}

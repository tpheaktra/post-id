<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class QuestionTotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qt = [
            [
                'name_en' => 'Yes',
                'name_kh' => 'មាន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'No',
                'name_kh' => 'គ្មាន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('question_totel')->insert($qt);
    }
}

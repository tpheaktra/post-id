<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EducationLevelTableSeeder extends Seeder
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
                'name_en' => 'Grade 1',
                'name_kh' => 'ថ្នាក់ទី ១',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 2',
                'name_kh' => 'ថ្នាក់ទី ២',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 3',
                'name_kh' => 'ថ្នាក់ទី ៣',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 4',
                'name_kh' => 'ថ្នាក់ទី ៤',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 5',
                'name_kh' => 'ថ្នាក់ទី ៥',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 6',
                'name_kh' => 'ថ្នាក់ទី ៦',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 7',
                'name_kh' => 'ថ្នាក់ទី ៧',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 8',
                'name_kh' => 'ថ្នាក់ទី ៨',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 9',
                'name_kh' => 'ថ្នាក់ទី ៩',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 10',
                'name_kh' => 'ថ្នាក់ទី ១០',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade​ 11',
                'name_kh' => 'ថ្នាក់ទី ១១',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Grade 12',
                'name_kh' => 'ថ្នាក់ទី ១២',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Bachelor Degree',
                'name_kh' => 'បរិញ្ញាប័ត្រ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Did not learn',
                'name_kh' => 'មិនបានរៀនសោះ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ];
        DB::table('education_level')->insert($household);
    }
}

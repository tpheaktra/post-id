<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TypeMeterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tm = [
            [
                'name_en' => 'Bikes',
                'name_kh' => 'កង់',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Motorbike or motorbike',
                'name_kh' => 'ម៉ូតូ ឬ ម៉ូតូ​រ៉ឺម៉ក',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Small class boat',
                'name_kh' => 'ទូកថ្នាក់តូច',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Boat machines',
                'name_kh' => 'ទូកម៉ាស៊ីន',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Ox cart (wooden or tire wheel)',
                'name_kh' => 'រទេះគោ (កង់ឈើ ឬកង់ឡាន)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Tractor',
                'name_kh' => 'គោយន្ត',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Other',
                'name_kh' => 'ផ្សេងៗ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('type_meterial')->insert($tm);
    }
}

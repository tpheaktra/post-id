<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ElectricGridTableSeeder extends Seeder
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
                'name_en' => 'Use the generator',
                'name_kh' => 'ប្រើម៉ាស៊ីនភ្លើង',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Use batteries',
                'name_kh' => 'ប្រើអាគុយ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Use a cigarette lamp',
                'name_kh' => 'ប្រើចង្កៀងប្រេងកាត',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Solar power',
                'name_kh' => 'ថាមពលព្រះអាទិត្យ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('electric_grid')->insert($ge);
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TypeAnimalsTableSeeder extends Seeder
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
                'name_en' => 'Cow - buffalo',
                'name_kh' => 'គោ-ក្របី',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Pigs',
                'name_kh' => 'ជ្រូក',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Goats - sheep',
                'name_kh' => 'ពពែ-ចៀម',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_en' => 'Chicken - duck',
                'name_kh' => 'មាន់-ទា',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('type_animals')->insert($tm);
    }
}

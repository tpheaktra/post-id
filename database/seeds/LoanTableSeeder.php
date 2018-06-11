<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class LoanTableSeeder extends Seeder
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
                'name_en' => 'No debt => If you need about 40,0000 Riel, can you borrow?',
                'name_kh' => 'មិនមាន​បំណុលទេ​ => បើអ្នកត្រូវការលុយប្រហែល៤០,០០០០រៀល តើអ្នកអាចខ្ចីគេបានទេ?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            'name_en' => 'Debt => outstanding debt to date',
            'name_kh' => 'មាន​បំណុល => ចំនួនបំណុលដែលមិនទាន់សងគិតមកដល់បច្ចុប្បន្ន',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ];
        DB::table('loan')->insert($household);
    }
}

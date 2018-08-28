<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'administrator',
                'username'=>'admin',
                'email' => 'tuypheaktra99@gmail.com',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            'name' => 'user test',
            'username'=>'user',
            'email' => 'tuypheaktra99@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]

        ];
        DB::table('users')->insert($user);
    }
}

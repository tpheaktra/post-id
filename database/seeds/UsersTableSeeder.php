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
                'profile'=>'avatar5.png',
                'email' => 'tuypheaktra99@gmail.com',
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
            'name' => 'user test',
            'username'=>'user',
            'profile'=>'avatar5.png',
            'email' => 'tuypheaktra99@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]

        ];
        DB::table('users')->insert($user);


            $role = [
                [
                    'name' => 'administrator',
                    'display_name'=>'administrator',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ];
        DB::table('roles')->insert($role);

        $user_role = [
            [
                'user_id' => 1,
                'role_id'=>1,
            ],
        ];
        DB::table('role_user')->insert($user_role);

        $permission_role = [
            [
                'permission_id' => 1,
                'role_id'       => 1,
            ],
            [
                'permission_id' => 2,
                'role_id'       => 1,
            ],
            [
                'permission_id' => 3,
                'role_id'       => 1,
            ],
            [
                'permission_id' => 4,
                'role_id'       => 1,
            ],
            [
                'permission_id' => 5,
                'role_id'       => 1,
            ],
            [
                'permission_id' => 6,
                'role_id'       => 1,
            ],
            [
                'permission_id' => 7,
                'role_id'       => 1,
            ],
            [
                'permission_id' => 8,
                'role_id'       => 1,
            ],
        ];
        DB::table('permission_role')->insert($permission_role);
    }
}

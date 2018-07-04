<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permission = [
            [
                'name' => 'role-list',
                'parent_id'    => 1,
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'parent_id'    => 1,
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'parent_id'    => 1,
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'parent_id'    => 1,
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'user-list',
                'parent_id'    => 2,
                'display_name' => 'Display Users',
                'description' => 'See only Listing Of Users'
            ],
            [
                'name' => 'user-create',
                'parent_id'    => 2,
                'display_name' => 'Create Users',
                'description' => 'Create New Usrs'
            ],
            [
                'name'         => 'user-edit',
                'parent_id'    => 2,
                'display_name' => 'Edit Users',
                'description'  => 'Edit Users'
            ],
            [
                'name'         => 'user-delete',
                'parent_id'    => 2,
                'display_name' => 'Deleted Users',
                'description'  => 'Deleted Users'
            ]
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
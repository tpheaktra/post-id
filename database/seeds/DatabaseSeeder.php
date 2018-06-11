<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(RelationshipTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(HouseholdFamilyTableSeeder::class);
        $this->call(HomePreparTableSeeder::class);
        $this->call(ConditionHouseTableSeeder::class);
    }
}

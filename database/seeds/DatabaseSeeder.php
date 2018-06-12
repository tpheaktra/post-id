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
        $this->call(UsersTableSeeder::class);
        $this->call(RelationshipTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(HouseholdFamilyTableSeeder::class);
        $this->call(HomePreparTableSeeder::class);
        $this->call(ConditionHouseTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(ElectricGridTableSeeder::class);
        $this->call(LandAgriculturalTableSeeder::class);
        $this->call(LoanTableSeeder::class);
        $this->call(FamilyRelationTableSeeder::class);
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
        $this->call(UsersTableSeeder::class);
        $this->call(RelationshipTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(HouseholdFamilyTableSeeder::class);
        $this->call(HomePreparTableSeeder::class);
        $this->call(ConditionHouseTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(ElectricGridTableSeeder::class);
        $this->call(LandAgriculturalTableSeeder::class);
        $this->call(LoanTableSeeder::class);
        $this->call(FamilyRelationTableSeeder::class);
        $this->call(EducationLevelTableSeeder::class);
        $this->call(OccupationTableSeeder::class);
        $this->call(RoofMadeSeeder::class);
        $this->call(WallMadeTableSeeder::class);
    }
}

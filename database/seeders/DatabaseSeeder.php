<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call([
            DesignationSeeder::class,
            UserSeeder::class,
            ItemSeeder::class,
            SkillSeeder::class,
            IndustrySeeder::class,
            TypeSeeder::class,
            StarterSeeder::class,
            LeaveSeeder::class,
            FreelancerApiKeySeeder::class,
            OptionSeeder::class,
            ProjectFilterSeeder::class,
            LanguageSeeder::class,
        ]);
    }
}

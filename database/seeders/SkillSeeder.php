<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = new Skill;
        $skill->name = "Bootstrap";
        $skill->status = 'active';
        $skill->save();

        $skill = new Skill;
        $skill->name = "jQuery";
        $skill->status = 'inactive';
        $skill->save();

        $skill = new Skill;
        $skill->name = "PHP";
        $skill->status = 'active';
        $skill->save();

        $skill = new Skill;
        $skill->name = "MySQL";
        $skill->status = 'active';
        $skill->save();
    }
}

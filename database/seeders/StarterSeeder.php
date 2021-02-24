<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Starter;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $starter = new Starter;
        $starter->status = 'active';
        $starter->description = 'Starter 1 is lorem ipsum is a dummy text.';
        $starter->save();
        
        $starter = new Starter;
        $starter->status = 'inactive';
        $starter->description = 'Starter 2 is lorem ipsum is a dummy text.';
        $starter->save();
    }
}

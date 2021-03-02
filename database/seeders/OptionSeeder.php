<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = new Option;
        $option->key = 'phase_2';
        $option->value = 'inactive';
        $option->save();
    }
}

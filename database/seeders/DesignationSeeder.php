<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designation = new Designation;
        $designation->name = "Bidder";
        $designation->status = "active";
        $designation->save();
    }
}

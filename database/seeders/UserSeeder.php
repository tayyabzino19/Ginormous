<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Ahmad Ayaz";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('google@123');
        $user->role = "admin";
        $user->status = "active";
        $user->save();

        $user = new User;
        $user->designation_id = 1;
        $user->name = "Ahsan Zahid";
        $user->email = "bidder@gmail.com";
        $user->password = Hash::make('google@123');
        $user->role = "bidder";
        $user->status = "active";
        $user->save();
    }
}

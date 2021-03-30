<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FreelancerApiClient;

class FreelancerApiClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new FreelancerApiClient;
        $client->client_id = "53598218";
        $client->auth_key = "FBK1GHW5um3R6nIXJlS7baqTm6aGPR";
        $client->status = 'connected';
        $client->save();
    }
}

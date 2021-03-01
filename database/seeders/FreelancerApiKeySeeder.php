<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FreelancerApiKey;

class FreelancerApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $freelancer_api_key = new FreelancerApiKey;
        $freelancer_api_key->user_id = 1;
        $freelancer_api_key->status = 'invalid';
        $freelancer_api_key->client_id = "F242UR&uyf423t84Lsa3";
        $freelancer_api_key->auth_key = "234234F242UR&uyf423t84Lsa3324234";
        $freelancer_api_key->save();
    }
}

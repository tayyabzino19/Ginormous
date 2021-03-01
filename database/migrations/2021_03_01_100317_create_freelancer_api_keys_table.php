<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerApiKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_api_keys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('client_id');
            $table->string('auth_key');
            $table->enum('status', ['connected', 'invalid'])->default('invalid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelancer_api_keys');
    }
}

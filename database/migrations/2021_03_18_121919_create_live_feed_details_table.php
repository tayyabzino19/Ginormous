<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveFeedDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_feed_details', function (Blueprint $table) {
            $table->id();
            $table->integer('live_feed_id');
            $table->text('description')->nullable();
            $table->json('jobs')->nullable();
            $table->json('attachments')->nullable();
            $table->json('reputation')->nullable();
            $table->json('status')->nullable();
            $table->json('country')->nullable();
            $table->integer('registration_date')->nullable();
            $table->string('username')->nullable();
            $table->string('public_name')->nullable();
            $table->string('avatar_cdn')->nullable();
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
        Schema::dropIfExists('live_feed_details');
    }
}

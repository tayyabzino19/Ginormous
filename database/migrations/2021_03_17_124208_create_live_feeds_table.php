<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_feeds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('project_id')->unique();
            $table->string('title');
            $table->string('seo_url')->nullable();
            $table->string('preview_description');
            $table->string('type');
            $table->json('budget')->nullable();
            $table->json('currency')->nullable();
            $table->json('upgrades')->nullable();
            $table->json('bid_stats')->nullable();
            $table->json('reputation')->nullable();
            $table->integer('time_submitted')->nullable();
            $table->integer('time_updated')->nullable();
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
        Schema::dropIfExists('live_feeds');
    }
}

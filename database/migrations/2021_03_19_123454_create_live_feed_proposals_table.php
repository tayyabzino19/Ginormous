<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveFeedProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_feed_proposals', function (Blueprint $table) {
            $table->id();
            $table->integer('live_feed_id')->nullable();
            $table->string('bidder_id')->nullable();
            $table->string('username')->nullable();
            $table->string('public_name')->nullable();
            $table->string('tagline')->nullable();
            $table->string('avatar_cdn')->nullable();
            $table->decimal('amount')->nullable();
            $table->integer('period')->nullable();
            $table->text('description')->nullable();
            $table->integer('submitdate')->nullable();
            $table->json('reputation')->nullable();
            $table->json('country')->nullable();
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
        Schema::dropIfExists('live_feed_proposals');
    }
}

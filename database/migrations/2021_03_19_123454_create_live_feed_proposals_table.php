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
            $table->integer('bid_id');
            $table->integer('live_feed_id');
            $table->integer('bidder_id');
            $table->string('username')->nullable();
            $table->string('public_name')->nullable();
            $table->text('tagline')->nullable();
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

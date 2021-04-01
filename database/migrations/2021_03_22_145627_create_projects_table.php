<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('freelancer_project_id')->unique();
            $table->string('title');
            $table->string('seo_url')->nullable();
            $table->text('preview_description')->nullable();
            $table->json('budget')->nullable();
            $table->json('currency')->nullable();
            $table->json('upgrades')->nullable();
            $table->json('bid_stats')->nullable();
            $table->integer('time_submitted');
            $table->integer('time_updated')->nullable();
            $table->json('employer_reputation');
            $table->enum('type', ['hourly', 'fixed']);
            $table->enum('status', ['missed', 'bid_later', 'bidded', 'replied', 'accepted']);
            $table->timestamp('action_date')->nullable();
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
        Schema::dropIfExists('projects');
    }
}

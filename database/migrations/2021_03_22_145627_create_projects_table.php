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
            $table->integer('project_id');
            $table->string('title');
            $table->text('preview_description')->nullable();
            $table->text('description')->nullable();
            $table->json('budget')->nullable();
            $table->json('jobs')->nullable();
            $table->json('attachments')->nullable();
            $table->json('currency')->nullable();
            $table->json('country')->nullable();
            $table->json('upgrades')->nullable();
            $table->json('bid_stats')->nullable();
            $table->integer('time_submited');
            $table->integer('time_updated')->nullable();
            $table->json('employer_reputation');
            $table->json('employer_status');
            $table->integer('employer_registration_date');
            $table->integer('employer_username');
            $table->integer('employer_public_name');
            $table->integer('employer_avatar_cdn')->nullable();
            $table->enum('type', ['hourly', 'fixed']);
            $table->enum('project_status', ['missed', 'bid_later', 'bidded', 'replied','accepted']);
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

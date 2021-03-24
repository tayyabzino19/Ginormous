<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->text('description')->nullable();
            $table->json('jobs')->nullable();
            $table->json('attachments')->nullable();
            $table->json('country')->nullable();
            $table->json('employer_status')->nullable();
            $table->integer('employer_registration_date')->nullable();
            $table->string('employer_username')->nullable();
            $table->string('employer_public_name')->nullable();
            $table->string('employer_avatar_cdn')->nullable();
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
        Schema::dropIfExists('project_details');
    }
}

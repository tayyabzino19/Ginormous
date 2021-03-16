<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_filters', function (Blueprint $table) {
            $table->id();
            $table->json('project_type')->nullable();
            $table->json('fixed_price')->nullable();
            $table->json('hourly_price')->nullable();
            $table->json('listing_type')->nullable();
            $table->text('projects_search_params')->nullable();
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
        Schema::dropIfExists('project_filters');
    }
}

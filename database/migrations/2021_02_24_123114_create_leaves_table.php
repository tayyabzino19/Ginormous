<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('reason');
            $table->date('leave_date')->nullable();
            $table->date('leave_date_from')->nullable();
            $table->date('leave_date_to')->nullable();
            $table->time('leave_time_from')->nullable();
            $table->time('leave_time_to')->nullable();
            $table->enum('type', ['short_leave', 'half_day', 'full_day', 'multiple_days'])->default('short_leave');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
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
        Schema::dropIfExists('leaves');
    }
}

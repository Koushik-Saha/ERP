<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_shifts', function (Blueprint $table) {
            $table->bigIncrements('shift_id');
            $table->unsignedBigInteger('shift_project_id');
            $table->string('shift_name');
            $table->string('shift_start');
            $table->string('shift_end');
            $table->timestamps();

            $table->foreign('shift_project_id')->references('project_id')
                ->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_shifts');
    }
}

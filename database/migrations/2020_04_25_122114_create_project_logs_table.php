<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_logs', function (Blueprint $table) {
            $table->bigIncrements('pl_id');
            $table->unsignedBigInteger('pl_user_id');
            $table->unsignedBigInteger('pl_project_id');
            $table->timestamps();

            $table->foreign('pl_user_id')->references('id')->on('users');
            $table->foreign('pl_project_id')->references('project_id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_logs');
    }
}

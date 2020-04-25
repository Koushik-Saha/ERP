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
          $table->bigIncrements('project_id');
          $table->string('project_name');
          $table->string('project_location');
          $table->unsignedBigInteger('project_client_id');
          $table->float('project_price',15,2);
          $table->string('project_status');
          $table->longText('project_description')->nullable();
          $table->string('project_image')->nullable();
          $table->string('project_date');
          $table->unsignedBigInteger('project_total_member')->nullable();
          $table->timestamps();

          $table->foreign('project_client_id')->references('id')->on('users');
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

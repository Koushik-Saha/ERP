<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->string('payment_type')->nullable(); // debit, credit
            $table->unsignedBigInteger('payment_to_user')->nullable();
            $table->unsignedBigInteger('payment_from_user')->nullable();
            $table->unsignedBigInteger('payment_to_bank_account')->nullable();
            $table->unsignedBigInteger('payment_from_bank_account')->nullable();
            $table->unsignedBigInteger('payment_for_project')->nullable();
            $table->string('payment_purpose'); // salary, project_money, expense, buy_item, office_transfer
            $table->string('payment_by')->default('cash'); // check, bank
            $table->float('payment_amount', 15, 2);
            $table->date('payment_date');
            $table->boolean('payment_withdrawn')->default(false);
            $table->string('payment_image')->nullable();
            $table->text('payment_note')->nullable();
            $table->timestamps();

            $table->foreign('payment_to_user')->references('id')->on('users');
            $table->foreign('payment_from_user')->references('id')->on('users');

//            $table->foreign('payment_to_bank_account')->references('bank_id')->on('bank_accounts');
//            $table->foreign('payment_from_bank_account')->references('bank_id')->on('bank_accounts');

            $table->foreign('payment_for_project')->references('project_id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

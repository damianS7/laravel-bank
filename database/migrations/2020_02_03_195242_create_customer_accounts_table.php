<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('account_id');
            $table->string("alias"); // nullable?
            $table->enum("status", ["open", "closed", "blocked"])->default("open");
            $table->enum("type", ["savings", "checking"])->default("savings");
            $table->enum("currency", ["EUR", "USD"])->default("EUR");
            $table->dateTime("created_on");
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('account_id')->references('id')->on('bank_accounts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_accounts');
    }
}

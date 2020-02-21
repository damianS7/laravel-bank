<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('account_id');
            $table->enum("type", ["credit", "debit", "vcc_debit"])->default("debit");
            $table->enum("status", ["active", "inactive", "blocked"])->default("inactive");
            $table->enum("currency", ["EUR", "USD"])->default("EUR");
            $table->decimal("balance");
            $table->dateTime("adquired_on");
            $table->foreign('card_id')->references('id')->on('bank_cards')->onDelete('CASCADE');
            $table->foreign('account_id')->references('id')->on('customer_accounts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_cards');
    }
}

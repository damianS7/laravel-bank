<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from_account_id');
            $table->unsignedBigInteger('to_account_id');
            $table->string("concept");
            $table->decimal("amount");
            $table->dateTime("transfer_date");
            $table->foreign('from_account_id')->references('id')->on('customer_accounts')->onDelete('CASCADE');
            $table->foreign('to_account_id')->references('id')->on('customer_accounts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internal_transfers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitapsTransactionOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitaps_transaction_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedInteger('amount');
            $table->string('tx_out');
            $table->string('address');
            $table->string('payout_tx_hash')->unique();
            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('id')
                ->on('bitaps_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitaps_transaction_outs');
    }
}

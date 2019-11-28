<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitaps_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('miner_fee');
            $table->string('tx_hash');
            $table->unsignedInteger('service_fee');
            $table->timestamp('timestamp');
            $table->string('time');
            $table->string('status');
            $table->string('hash');
            $table->unsignedInteger('amount');
            $table->unsignedSmallInteger('tx_out');
            $table->string('notification');
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
        Schema::dropIfExists('bitaps_transactions');
    }
}

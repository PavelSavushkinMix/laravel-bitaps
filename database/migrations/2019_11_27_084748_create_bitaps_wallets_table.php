<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitaps_wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('currency_id');
            $table->string('wallet_id');
            $table->string('wallet_hash');
            $table->string('callback_link')->nullable()->default(null);
            $table->text('password');
            $table->timestamps();

            $table->foreign('currency_id')
                ->references('id')
                ->on('bitaps_currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitaps_wallets');
    }
}

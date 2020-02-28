<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitapsAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitaps_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('domain_id')->nullable()->default(null);
            $table->unsignedBigInteger('wallet_id')->nullable()->default(null);
            $table->text('payment_code');
            $table->string('callback_link');
            $table->string('forwarding_address')->nullable()->default(null);
            $table->unsignedSmallInteger('confirmations');
            $table->string('address');
            $table->string('invoice');
            $table->timestamps();

            $table->foreign('currency_id')
                ->references('id')
                ->on('bitaps_currencies');
            $table->foreign('domain_id')
                ->references('id')
                ->on('bitaps_domains');
            $table->foreign('wallet_id')
                ->references('id')
                ->on('bitaps_wallets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitaps_addresses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
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
            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('wallet_id')->nullable()->default(null);
            $table->text('payment_code');
            $table->string('callback_link');
            $table->string('forwarding_address');
            $table->unsignedSmallInteger('confirmations');
            $table->string('address');
            $table->string('legacy_address');
            $table->string('invoice');
            $table->string('currency', 10)->index();
            $table->timestamps();

            $table->foreign('domain_id')
                ->references('id')
                ->on('domains');
            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets');
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

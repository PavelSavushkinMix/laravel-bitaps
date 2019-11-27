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
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('payment_code');
            $table->string('callback_link');
            $table->string('forwarding_address');
            $table->string('domain_hash');
            $table->unsignedSmallInteger('confirmations');
            $table->string('address');
            $table->string('legacy_address');
            $table->string('domain');
            $table->string('invoice');
            $table->string('currency', 10);
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
        Schema::dropIfExists('addresses');
    }
}

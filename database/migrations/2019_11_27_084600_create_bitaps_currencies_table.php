<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PostMix\LaravelBitaps\Models\Currency;

class CreateBitapsCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitaps_currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 6)->unique();
            $table->unsignedDecimal('service_fee', 8, 8);
            $table->string('name');
            $table->timestamps();
        });

        Currency::query()->insert([
            [
                'name' => 'Bitcoin',
                'code' => 'btc',
                'service_fee' => 0.0002,
            ],
            [
                'name' => 'Litecoin',
                'code' => 'ltc',
                'service_fee' => 0.0004,
            ],
            [
                'name' => 'Bitcoin Cash',
                'code' => 'bch',
                'service_fee' => 0.0004,
            ],
            [
                'name' => 'Ethereum',
                'code' => 'eth',
                'service_fee' => 0.002,
            ],
            [
                'name' => 'Bitcoin Testnet',
                'code' => 'tbtc',
                'service_fee' => 0,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitaps_currencies');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hjuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('total_belanja');
            $table->integer('total_shipping');
            $table->string('kurir_pengiriman');
            $table->string('paket_pengiriman');
            $table->foreignId('address_id');
            $table->foreignId('provinsi_id');
            $table->foreignId('city_id');
            $table->foreignId('kecamatan_id');
            $table->string('status');
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
        Schema::dropIfExists('hjuals');
    }
};

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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->foreignId('category_id');
            $table->string('slug')->unique();
            $table->integer('harga');
            $table->integer('harga_beli')->nullable();
            $table->integer('stok');
            $table->longtext('deskripsi');
            $table->foreignId('merk_id');
            $table->float('berat')->nullable();
            $table->foreignId('size_id')->nullable();
            $table->foreignId('slot_id')->nullable();
            $table->foreignId('socket_id')->nullable();
            $table->integer('power')->nullable();
            $table->integer('nvme')->nullable();
            $table->integer('dimm')->nullable();
            $table->integer('m2')->nullable();
            $table->integer('sata')->nullable();
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
        Schema::dropIfExists('barangs');
    }
};

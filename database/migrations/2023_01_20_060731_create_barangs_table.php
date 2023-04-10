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
            $table->string('slug');
            $table->integer('harga');
            $table->char('deskripsi' , 255);
            $table->foreignId('size')->nullable();
            $table->foreignId('ddr')->nullable();
            $table->foreignId('socket')->nullable();
            $table->string('power');
            $table->integer('nvme');
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

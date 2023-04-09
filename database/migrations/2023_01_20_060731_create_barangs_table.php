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
            $table->string('nama_barang')->nullable();
            $table->foreignId('category_id');
            $table->string('slug');
            $table->integer('harga')->nullable();
            $table->char('deskripsi' , 255);
            $table->string('size');
            $table->string('ddr');
            $table->string('socket');
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

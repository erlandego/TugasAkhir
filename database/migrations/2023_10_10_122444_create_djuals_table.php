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
        Schema::create('djuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hjual_id');
            $table->foreignId('barang_id')->nullable();
            $table->foreignId('rakitan_id')->nullable();
            $table->integer('subtotal');
            $table->integer('qty');
            $table->integer('berat');
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
        Schema::dropIfExists('djuals');
    }
};

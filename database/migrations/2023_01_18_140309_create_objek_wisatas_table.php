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
        Schema::create('objek_wisatas', function (Blueprint $table) {
            $table->id();
            $table->integer("daerah_id");
            $table->string("nama");
            $table->integer("harga")->nullable();
            $table->string("fasilitas")->nullable();
            $table->string("gambar")->nullable();
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
        Schema::dropIfExists('objek_wisatas');
    }
};

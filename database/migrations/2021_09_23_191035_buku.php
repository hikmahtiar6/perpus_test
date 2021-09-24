<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Buku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('buku_id');
            $table->unsignedBigInteger('pencipta_id');
            $table->string('buku_kode');
            $table->string('buku_judul');
            $table->string('buku_tahun_terbit');
            $table->string('buku_stok');
            $table->foreign('pencipta_id')->references('pencipta_id')->on('pencipta')->onDelete('cascade');
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
        Schema::dropIfExists('buku');
    }
}

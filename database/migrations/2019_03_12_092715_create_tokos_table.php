<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->increments('id_toko');
            $table->integer('id_produk');
            $table->string('nama_toko');
            $table->text('alamat_toko');
            $table->string('pj_toko');
            $table->string('no_telp');
            $table->string('icon_toko');
            $table->string('web_toko');
            $table->enum('stts_toko',['0','1']);
            $table->date('tgl_pembuatan_toko');
            $table->integer('id_point');
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
        Schema::dropIfExists('tokos');
    }
}

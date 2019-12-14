<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->integer('id_kategori');
            $table->string('nama_produk');
            $table->string('merk_produk');
            $table->text('desc_produk');
            $table->biginteger('harga_produk');
            $table->integer('stok_produk');
            $table->string('kondisi_produk');
            $table->integer('id_toko');
            $table->integer('id_unit');
            $table->integer('id_media');
            $table->integer('id_point');
            $table->enum('is_promo',['0','1']);
            $table->enum('is_favorit',['0','1']);
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
        Schema::dropIfExists('produks');
    }
}

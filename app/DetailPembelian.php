<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $table ='detail_pembelians';
    protected $primaryKey = 'id_detail_pembelian';
    protected $fillable =['id_pembelian','id_produk','harga_beli','jumlah','sub_total'];

    public function produk(){
    	return $this->belongsTo('App\Produk','id_produk');
    }
    public function pembelian(){
    	return $this->belongsTo('App\Pembelian','id_pembelian');
    }
}

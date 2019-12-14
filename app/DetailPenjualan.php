<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table ='detail_penjualans';
    protected $primaryKey = 'id_detail_penjualan';
    protected $fillable = ['id_penjualan','id_produk','harga_jual','jumlah','diskon','sub_total'];

     public function penjualan(){
    	return $this->belongsTo('App\Penjualan','id_penjualan');
    }

    public function produk(){
    	return $this->belongsTo('App\Produk','id_produk');
    }
}

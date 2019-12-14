<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjangs';
    protected $primaryKey ='id_keranjang';
    protected $fillable=['id_user','id_produk','id_penjual','nama_penjual','harga_beli','is_status'];

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
    public function produk(){
    	return $this->belongsTo('App\Produk','id_produk');
    }
    public function file_produk(){
        return $this->belongsTo('App\Produk','file_produk');
    }
     public function penjual(){
        return $this->belongsTo('App\User','id_penjual');
    }
}

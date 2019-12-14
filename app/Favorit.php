<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
   protected $table='favorits';
   protected $primaryKey ='id_favorit';
   protected $fillable=['id_user','id_produk','id_penjual','nama_penjual','harga_beli'];
  
   public function user(){
    	return $this->belongsTo('App\User','id_user');
   }
   public function produk(){
    	return $this->belongsTo('App\Produk','id_produk');
   }
}

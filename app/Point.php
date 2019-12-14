<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $primaryKey = 'id_point';
    protected $fillable = ['id_produk','jlh_point'];

    // public function toko(){
    // 	return $this->belongsTo('App\Toko','id_toko');
    // }
    public function produk(){
    	return $this->belongsTo('App\Produk','id_produk','id_produk');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';
    protected $primaryKey = 'id_order';
    protected $fillable=['id_produk','id_suplier','tgl_order','qty'];

    public function produk(){
    	return $this->belongsTo('App\Produk','id_produk');
    }
    public function suplier(){
    	return $this->belongsTo('App\Suplier','id_suplier');
    }
}

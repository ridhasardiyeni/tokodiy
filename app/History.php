<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table='historys';
    protected $primaryKey = 'id_history';
    protected $fillable=['kode_pembayaran','id_user','id_detailuser','id_penjual','id_produk','harga_beli','jlh_beli','total_harga','id_jasapengiriman','total_bayar'];

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function penjual(){
        return $this->belongsTo('App\User','id_penjual');
    }

    public function produk(){
    	return $this->belongsTo('App\Produk','id_produk');
    }

    public function detailuser(){
    	return $this->belongsTo('App\DetailUser','id_detailuser');
    }
    
    public function jasapengiriman(){
        return $this->belongsTo('App\JasaPengiriman','id_jasapengiriman');
    }

}

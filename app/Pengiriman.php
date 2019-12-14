<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengirimans';
    protected $primaryKey ='id_pengiriman';
    protected $fillable =['kode_pembayaran','id_penjual','id_user','no_resi'];

    public function pembeli(){
    	return $this->belongsTo('App\User','id_user');
    }
     
     public function penjual(){
        return $this->belongsTo('App\User','id_penjual');
    }

   
}

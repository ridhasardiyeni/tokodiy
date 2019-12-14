<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table ='pembelians';
    protected $primaryKey = 'id_pembelian';
    protected $fillable =['kode_pembelian','total_item','total_harga','diskon','bayar','id_suplier'];

     public function suplier(){
    	return $this->belongsTo('App\Suplier','id_suplier');
    }
}

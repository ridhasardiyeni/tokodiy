<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';
    protected $primaryKey= 'id_penjualan';
    protected $fillable =['kode_penjualan','total_item','total_harga','diskon','bayar','kembalian','id_user'];

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}

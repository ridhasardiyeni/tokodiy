<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'tokos';
    protected $primaryKey = 'id_toko';
    protected $fillable = ['kode_toko','nama_toko','alamat_toko','lat_lang','pj_toko','no_telp','icon_toko','web_toko','stts_toko','tgl_pembuatan_toko','id_point'];

     public function point(){
    	return $this->belongsTo('App\Point','id_point');
    }
}

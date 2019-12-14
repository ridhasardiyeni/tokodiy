<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    protected $fillable =['id_user','id_kategori','nama_produk','merk_produk','desc_produk','harga_produk','stok_produk','kondisi_produk','file_produk','id_unit','is_promo','is_favorit'];

    
    public function kategori(){
    	return $this->belongsTo('App\Kategori','id_kategori');
    }
    
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
   
    public function unit(){
        return $this->belongsTo('App\Unit','id_unit');
    }

    public function media(){
        return $this->hasMany('App\Media','id_produk','id_produk');
    }
    public function history(){
        return $this->hasMany('App\History','id_user','id_user');
    }

    

}

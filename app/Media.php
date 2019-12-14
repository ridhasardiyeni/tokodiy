<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    protected $primaryKey = 'id_media';
    protected $fillable =['id_produk','file_media'];

     public function produk(){
    	return $this->belongsTo('App\Produk','id_produk');
    }


}


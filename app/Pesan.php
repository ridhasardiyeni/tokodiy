<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesans';
    protected $primaryKey = 'id_pesan';
    protected $fillable = ['id_user','subjek','isi_pesan','penerima_pesan'];

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}

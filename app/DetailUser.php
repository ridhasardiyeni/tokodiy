<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    protected $table='detail_users';
    protected $primaryKey ='id_detailuser';
    protected $fillable=['id_user','jk','alamat','icon_user','level'];
    
     public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}

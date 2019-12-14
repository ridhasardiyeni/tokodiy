<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table='pembayarans';
    protected $primaryKey='id_pembayaran';
    protected $fillable=['id_user','jenis_pembayaran','norek','jlh_pembayaran','bukti_pembayaran'];

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
}

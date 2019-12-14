<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class JasaPengiriman extends Model
{
    protected $table ='jasapengirimans';
    protected $primaryKey ='id_jasapengiriman';
    protected $fillable=['jenis_jasa','harga_jasa'];
}

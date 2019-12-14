<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'supliers';
    protected $primaryKey = 'id_suplier';
    protected $fillable = ['nama_suplier','alamat_suplier','no_telp'];
}

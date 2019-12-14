<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'id_unit';
    protected $fillable = ['nama_unit','keterangan'];
}

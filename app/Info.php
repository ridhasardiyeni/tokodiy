<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $tables='infos';
    protected $primaryKey='id_info';
    protected $fillable=['judul_info','isi_info','gambar_info'];
}

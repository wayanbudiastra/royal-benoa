<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    //
    protected $table = 'golongan';
    protected $fillable = ['id','kode', 'nama_golongan', 'margin', 'keterangan', 'aktif', 'create_at', 'update_at'];

}

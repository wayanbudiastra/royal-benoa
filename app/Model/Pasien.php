<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table = 'pasien';
    protected $fillable = ['nocm', 'nama', 'alamat', 'tempat_lahir', 'tgl_lahir', 'pekerjaan', 'pendidikan', 'create_at', 'update_at'];

}

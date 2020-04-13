<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Katagori extends Model
{
    //
    protected $table = 'katagori';
    protected $fillable = ['id', 'nama_katagori', 'keterangan', 'aktif', 'create_at', 'update_at'];

     public function sub_katagori()
    {
        return $this->hasMany('App\Model\Sub_katagori');
    }
    
    public function produk()
    {
        return $this->belongsTo('App\Model\Produk');
    } 

}

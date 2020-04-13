<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sub_katagori extends Model
{
    //
    protected $table = 'sub_katagori';
    protected $fillable = ['id','katagori_id','nama_subkatagori', 'keterangan', 'create_at', 'update_at'];

     public function katagori()
    {
        return $this->belongsTo('App\Model\Katagori');
    } 

    public function produk()
    {
        return $this->hasMany('App\Model\Produk');
    } 
   
}

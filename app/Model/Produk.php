<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $table = 'produk';
    protected $fillable = ['barcode', 'nama_produk', 'katagori_id', 'sub_katagori_id', 'suplier_id', 'keterangan', 'aktif', 'gambar','create_at', 'update_at'];

    public function katagori()
    {
        return $this->belongsTo('App\Model\Katagori');
    }

    public function sub_katagori()
    {
        return $this->belongsTo('App\Model\Sub_katagori');
    }

}

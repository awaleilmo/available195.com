<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    //
    protected $fillable = ['id','kategori_id','nama',];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function produk(){
        return $this->hasOne(Produk::class);
    }
}

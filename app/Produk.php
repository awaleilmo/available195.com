<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['id','subkategori_id','nama','deskripsi','ukuran','harga',];

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class);
    }
}

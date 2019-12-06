<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $fillable = ['id','nama',];


    public function sub(){
        return $this->hasOne(Subkategori::class);
    }

}

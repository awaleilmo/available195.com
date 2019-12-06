<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $fillable = ['user_id','tempat','penerima','nomor_hp','address','provinsi','kota','kecamatan','kode_pos',];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

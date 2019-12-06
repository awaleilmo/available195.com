<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akunbank extends Model
{
    protected $fillable =[
      'user_id','nama_akun','nomor_akun','nama_bank','cabang',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

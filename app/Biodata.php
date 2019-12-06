<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable =[
      'user_id','first_name','last_name','tanggal_lahir','jenis_kelamin',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

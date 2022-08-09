<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table ='pesan';
    protected $fillable = [
        'id_user', 'topik', 'pesan','read'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }
    public function balasan(){
        return $this->hasOne(Balasan::class,'id_pesan','id');
    }
}


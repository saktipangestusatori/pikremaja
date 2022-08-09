<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    use HasFactory;
    protected $table ='balasan';
    protected $fillable = [
        'id_pesan', 'balasan', 'read'
    ];
    public function pesan(){
        return $this->hasOne(Pesan::class,'id','id_pesan');
    }
}

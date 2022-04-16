<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{

    protected $fillable = ['nama' , 'email', 'alamat' ];

    public function mahaisiswa(){
        return $this->hasMany(mahasiswa::class);
    }
    
    use HasFactory;
}

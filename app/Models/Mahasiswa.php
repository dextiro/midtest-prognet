<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    protected $fillable = ['nama' , 'nim', 'email', 'alamat', 'no_telepon ', 'id' ];

    public function jurusan(){
        return $this->belongsTo(jurusan::class);
    }

    use HasFactory;
}

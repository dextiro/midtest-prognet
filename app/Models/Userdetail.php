<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    protected $fillable = [ 'id' ];
    use HasFactory;
    
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
    public function kelompok_studi(){
        return $this->belongsTo(KelompokStudi::class, 'id_kelompokstudi');
    }
}

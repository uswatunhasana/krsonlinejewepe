<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\User;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'kelas','user_id','fakultas_id','jurusan_id','semester'];
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

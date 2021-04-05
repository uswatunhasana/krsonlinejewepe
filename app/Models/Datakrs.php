<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class Datakrs extends Model
{
    use HasFactory;
    protected $table ='datakrss';
    protected $fillable = ['kode_krs','jumlah', 'mahasiswa_id','matakuliah_id'];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'matakuliah_id');
    }
}

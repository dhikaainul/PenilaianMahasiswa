<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nis', 'nama','jenis_kelamin', 'image', 'alamat', 'no_telp', 'id_kelas'];
    
    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama_kelas','tingkatan','jurusan'];

    public function siswa()
    {
        return $this->hasMany('App\Siswa');
    }
}

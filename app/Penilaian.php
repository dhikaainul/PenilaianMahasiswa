<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = ['id_siswa', 'id_mapel', 'nilai', 'nilai_setara', 'nilai_huruf'];
    
    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }

    public function mapel()
    {
        return $this->belongsTo('App\MataPelajaran', 'id_mapel');
    }
}

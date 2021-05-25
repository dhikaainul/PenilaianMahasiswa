<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['datetime', 'status','nama_mapel','nama_siswa','kelas','id_mapel'];
    public function mapel()
    {
        return $this->belongsTo('App\MataPelajaran', 'id_mapel');
    }
}

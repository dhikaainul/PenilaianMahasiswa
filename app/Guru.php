<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nip', 'nama','jenis_kelamin', 'alamat', 'no_telp', 'id_mapel'];
    
    public function mapel()
    {
        return $this->belongsTo('App\MataPelajaran', 'id_mapel');
    }
}

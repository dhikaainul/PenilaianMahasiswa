<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $fillable = ['nama_mapel','jam'];

    public function guru()
    {
        return $this->hasMany('App\Guru');
    }
}

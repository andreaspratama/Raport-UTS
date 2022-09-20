<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nama', 'nilai']);       
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seni extends Model
{
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);       
    }
}

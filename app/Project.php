<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['thnakademik', 'nilai', 'task', 'hasil']);       
    }
}

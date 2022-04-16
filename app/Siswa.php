<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nisn', 'nama', 'unit', 'kelas', 'user_id'
    ];

    protected $hidden = [];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['thnakademik', 'nilai']);
    }

    public function thnakademik()
    {
        return $this->belongsToMany(Thnakademik::class);
    }

    public function project()
    {
        return $this->belongsToMany(Project::class)->withPivot(['thnakademik', 'nilai', 'task', 'hasil']);
    }

    // public function mapels()
    // {
    //     return $this->belongsToMany('App\Mapel');
    // }
    
    // public function ambilNilai()
    // {
    //     $nilai = "";
    //     foreach($this->mapel as $mapel) {
    //         $nilai = $mapel->pivot->nilai;
    //     }

    //     return $nilai;
    // }

    // public function namaMapel()
    // {
    //     $np = "0";
    //     foreach($this->mapel as $mapel) {
    //         $np = $mapel->nama_mapel;
    //     }

    //     return $np;
    // }
}

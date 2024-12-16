<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jabatan_id',
        'desc',
        'bobot',
        'target',
        'realisasi',
        'skor',
        'final_skor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function getJabatanDesc()
    {
        return $this->jabatan->desc;
    }

    public function getJabatanBobot()
    {
        return $this->jabatan->bobot;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'perilaku', 'nilai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

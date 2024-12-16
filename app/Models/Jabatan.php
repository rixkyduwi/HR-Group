<?php

namespace App\Models;

use App\Models\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'desc', 'bobot'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kpis()
    {
        return $this->hasMany(Kpi::class);
    }
    public function descriptions()
    {
        return $this->hasMany(Description::class); // Adjust this if it's a different relationship
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['tipe', 'title', 'luas_tanah', 'luas_bangunan', 'desc1', 'desc2', 'harga', 'foto'];

    public function pembeli()
    {
        return $this->hasMany(Pembeli::class);
    }
}

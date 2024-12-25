<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor_kartu',
        'alamat_penagih',                       
        'title',
        'tipe',
        'harga',        
        'property_id',             
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

}

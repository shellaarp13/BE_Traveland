<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourGuides extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'username',
        'password',
        'name',
        'fee',
        'profile',
        'available',
        'tempat_wisata_id'
    ];

    public function tempatwisata(){
        return $this-> hasMany(TempatWisata::class);
    }
}

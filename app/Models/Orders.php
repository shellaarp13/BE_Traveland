<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'date',
        'total',
        'user_id',
        'tempat_wisata_id',
        'tour_guide'
    ];

    public function destinasis(){
        return $this->hasMany(Destinasi::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function tourguides(){
        return $this->hasMany(TourGuide::class);
    }
}

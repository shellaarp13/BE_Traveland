<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'quantity',
        'payment_method',
        'order_id'
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }
}

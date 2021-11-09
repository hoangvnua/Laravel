<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user_info(){
        return $this->belongsTo(UserInfo::class);
    }

    public function order_products(){
        return $this->belongsToMany(OrderProduct::class);
    }
}

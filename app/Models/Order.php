<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class,'user_id','user_id');
    }

    public function offcodes()
    {
        return $this->belongsToMany(Offcode::class,'orders_offcodes','offcode_id','order_id');
    }
}

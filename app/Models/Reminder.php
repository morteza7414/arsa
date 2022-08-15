<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $table = 'reminders';

    protected $guarded =[];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}

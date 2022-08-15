<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table='properties';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_properties', 'product_id', 'property_id');
    }
}

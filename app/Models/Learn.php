<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Learn extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'learns';

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'learns_products', 'learn_id', 'product_id');
    }

    public function getCreatedAtInPersian()
    {
        return verta($this->updated_at)->format('Y/m/d');
    }

    public function gallery()
    {
        return DB::table('learns_gallery')->where('learn_id','=',$this->id)->get();
    }

    public function images()
    {
        return DB::table('learns_gallery')->where('learn_id','=',$this->id)
            ->where('video','=',null)->get();
    }
    public function videos()
    {
        return DB::table('learns_gallery')->where('learn_id','=',$this->id)
            ->where('image','=',null)->get();
    }

}

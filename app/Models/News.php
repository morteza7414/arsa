<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'news';
    public $dates = ['deleted_at'];
    protected $guarded = [];

    public function getUpdatedAtInPersian()
    {
        return verta($this->updated_at)->format('Y/m/d');
    }

    public function gallery()
    {
        return DB::table('news_gallery')->where('news_id','=',$this->id)->get();
    }

    public function images()
    {
        return DB::table('news_gallery')->where('news_id','=',$this->id)
            ->where('video','=',null)->get();
    }
    public function videos()
    {
        return DB::table('news_gallery')->where('news_id','=',$this->id)
            ->where('image','=',null)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $table= 'projects';
    protected $guarded = [];

    public function getCreatedAtInPersian()
    {
        return verta($this->updated_at)->format('Y/m/d');
    }

    public function gallery()
    {
        return DB::table('projects_gallery')->where('project_id','=',$this->id)->get();
    }

    public function images()
    {
        return DB::table('projects_gallery')->where('project_id','=',$this->id)
            ->where('video','=',null)->get();
    }
    public function videos()
    {
        return DB::table('projects_gallery')->where('project_id','=',$this->id)
            ->where('image','=',null)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'representations';

    public function getDateInPersian()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
}

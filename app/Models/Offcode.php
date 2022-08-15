<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offcode extends Model
{
    use HasFactory;

    protected $table = 'offcodes';

    protected $guarded = [];

    public function remainingtime($time,$created_at)
    {
        if (!empty($time)){
        $now = Carbon::now();
        $offtime =$created_at->addHour($time);
        if ($offtime > $now){
           return verta($offtime)->addHour(3)->addMinute(30); ;
        }else{
            return 0 ;
        }
        }else{
            return null;
        }
    }

    public function status()
    {
        if (isset($this->quantity)){
            if ($this->quantity > 0){
                return 'فعال';
            }else{
                return 'منقضی شده';
            }
        }elseif (empty($this->quantity) and !empty($this->time)){
            $now = Carbon::now();
            $offtime = $this->created_at->addHour($this->time);
            if ($offtime>$now){
                return 'فعال';
            }else{
                return 'منقضی شده';
            }
        }else{
            return 'نامعلوم';
        }
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'orders_offcodes','order_id','offcode_id');
    }
}

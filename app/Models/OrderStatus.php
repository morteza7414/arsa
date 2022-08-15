<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'order_statuses' ;

    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }

    public function getStatusInFarsi()
    {
        if ($this->status === 1) return 'ثبت شده';
        if ($this->status === 2) return 'تایید شده';
        if ($this->status === 3) return 'در حال آماده سازی';
        if ($this->status === 4) return 'آماده ارسال';
        if ($this->status === 5) return 'ارسال شده';
    }

}

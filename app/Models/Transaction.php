<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "payment_id",
        "user_id",
        "carts",
        "paid",
        "status",
        "invoice_details",
        "transaction_id",
        "transaction_result",
        "address",
        "postalcode",
    ];

    const STATUS_FAILED = 0;
    const STATUS_PENDING = 1;
    const STATUS_SUCCESS = 2;

    protected $casts = [
        'carts' => 'array', // Will convarted to (Array)
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function orderStatus()
    {
        return $this->hasOne(OrderStatus::class,'transaction_id','id');
    }





    public function setInvoiceDetailsAttribute($value)
    {
        $this->attributes['invoice_details']= serialize($value);
    }
    public function getInvoiceDetailsAttribute()
    {
        return unserialize($this->attributes['invoice_details']);
    }


    public function setTransactionResultAttribute($value)
    {
        $this->attributes['transaction_result']= serialize($value);
    }
    public function getTransactionResultAttribute()
    {
        return unserialize($this->attributes['transaction_result']);
    }


    public function setCartsAttribute($value)
    {
        $this->attributes['carts']= serialize($value);
    }
    public function getCartsAttribute()
    {
        return unserialize($this->attributes['carts']);
    }


    public function getCreatedAtInPersian()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
}

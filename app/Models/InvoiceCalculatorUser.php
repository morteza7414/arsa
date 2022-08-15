<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceCalculatorUser extends Model
{
    use HasFactory;
    protected $table='invoice_calculator_users';
    protected $guarded = [];

    public function getDateInPersian()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
}

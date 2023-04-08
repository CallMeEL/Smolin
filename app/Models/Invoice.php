<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'user_id',
        'motor_id',
        'rent_date',
        'return_date',
        'total_price',
        'payment_status',
        'payment_proof',
    ];
}

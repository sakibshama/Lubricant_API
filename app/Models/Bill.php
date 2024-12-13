<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'sell_id',
        'customer_id',
        'total_amount',
        'paid_amount',
        'due_amount',
        'discount',
        'status'
    ];

    // Define relationship to Sell
    public function sell()
    {
        return $this->belongsTo(Sell::class);
    }

    // Define relationship to Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllStock extends Model
{
    use HasFactory;

    protected $table = 'all_stock';
    protected $fillable = [
        'product_id',
        'supplier_id',
        'stock_id',
        'quantity',
        'buy_price',
        'sell_price',
        'stock_date',
        'paid_amount',
        'dues',
        'total',
        'priority',
        'image',
        'status',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Define the relationship with the Supplier model.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

}

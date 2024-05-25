<?php

namespace App\Models\Cart_Checkout;

use App\Models\Product\Product;
use App\Models\Cart_Checkout\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_item';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'cart_id',
        'quantity',
        'price',
        'total_price',
        'date_created'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}

<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'product_id',
        'paymentMethod',
        'quantity',
        'unit_price',
        'sub_price'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function orders() {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}

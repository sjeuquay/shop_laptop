<?php

namespace App\Models\Product;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order\Orders;
use App\Models\Product\Thumnail;
use App\Models\Product\Specifications;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'is_stock',
        'description',
        'quantity_available',
        'price',
        'hot',
        'sale_price',
        'view',
        'image',
        'time_up',
    ];

    public function orders() {
        return $this->hasMany(Orders::class, 'product_id');
    }
    public function specification() {
        return $this->hasOne(Specifications::class, 'product_id');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function thumnail() {
        return $this->hasMany(Thumnail::class, 'product_id');
    }
}

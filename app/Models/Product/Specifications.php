<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Specifications extends Model
{
    use HasFactory;
    protected $table = 'specifications';
    public $timestamps = false;
    protected $fillable = [
        'content',
        'company',
        'type',
        'ram',
        'Capacity',
        'screen_size',
        'card_screen',
        'product_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

}

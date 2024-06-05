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
        'OS',
        'product_id',
        'hard_disk',
        'ram',
        'capacity',
        'screen_size',
        'card_screen',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

}

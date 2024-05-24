<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Thumnail extends Model
{
    use HasFactory;
    protected $table = 'productthumnail';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'img_thumnail',
        'product_id ',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

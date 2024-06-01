<?php

namespace App\Models\Product;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer_review';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'name',
        'email',
        'date_created'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

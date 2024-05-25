<?php

namespace App\Models\Cart_Checkout;

use App\Models\User\User;
use App\Models\Cart_Checkout\CartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'total_price',
        'date_created'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function cartItem() {
        return $this->hasMany(CartItem::class);
    }
}

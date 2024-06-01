<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use App\Models\User\User;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'status_id',
        'paymentMethod',
        'amount',
        'pay_amount',
        'zip',
        'phone',
        'email',
        'ship_address1',
        'ship_address2',
        'customer_notes',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function orderDetail() {
        return $this->hasMany(orderDetail::class, 'order_id');
    }
}

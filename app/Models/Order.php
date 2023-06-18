<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'order_price',
        'discount',
        'receiving_id',
        'courier_id',
        'order_status_id',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function receiving(){
        return $this->belongsTo(Receiving::class);
    }

    public function order_status(){
        return $this->belongsTo(OrderStatus::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }

    public function courier(){
        return $this->hasOne(Courier::class);
    }

}

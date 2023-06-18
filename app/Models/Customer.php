<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = 'customers';
    protected $guarded = false;

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
    public function loyality(){
        return $this->belongsTo(Customer::class);
    }
}

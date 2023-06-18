<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{
    use HasFactory;
    protected $table = 'receivings';

    public function orders(){
        return $this->hasMany(Order::class);
    }
}

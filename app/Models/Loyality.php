<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loyality extends Model
{
    use HasFactory;
    protected $table = 'loyalities';
    protected $guarded = false;

    public function customer(){
        return $this->hasOne(User::class);
    }
}

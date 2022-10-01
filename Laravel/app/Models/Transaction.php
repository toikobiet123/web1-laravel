<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fullname',
        'email',
        'phone',
        'address',
        'message',
        'total_price',
        'status',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class,'transaction_id','id');
    }
}

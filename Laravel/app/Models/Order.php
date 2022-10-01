<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'transaction_id',
        'product_id',
        'quantity',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function Transaction()
    {
        $this->belongsTo(Transaction::class,'transaction_id','id');
    }
}

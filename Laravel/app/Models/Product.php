<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
        'image',
        'size_id',
        'cate_id',
        'image_list'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'product_id','id');
    }
}

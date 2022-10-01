<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
         'product_id',
         'parent_id',
         'comment',
         'created_at'];
    public function user()
    {
          return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class Product extends Model
{


    protected $fillable = ['name', 'quantity', 'price', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'manufacturer',
        'release_date',
        'price',
        'quantity',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id');
    }

}

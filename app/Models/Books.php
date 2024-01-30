<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories_id',
        'title',
        'description',
        'image_url',
        'release_year',
        'price',
        'total_page',
        'thickness',
    ];

    //Relation to Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}

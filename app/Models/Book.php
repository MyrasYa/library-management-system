<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_code',
        'title',
        'author',
        'publisher',
        'publish_year',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

}

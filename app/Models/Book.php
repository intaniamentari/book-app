<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return BookFactory::new();
    }

    protected $fillable = [
        'title',
        'category_id',
        'writer_id',
        'year'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function writer() {
        return $this->belongsTo(Writer::class);
    }

    public function scopeSortByTitle($query)
    {
        return $query->orderBy('title');
    }
}

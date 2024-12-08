<?php

namespace App\Models;

use Carbon\Factory;
use Database\Factories\WriterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Writer extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['name'];

    protected static function newFactory()
    {
        return WriterFactory::new();
    }

    public function books() {
        return $this->hasMany(Book::class);
    }
}

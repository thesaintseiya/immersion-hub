<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title-en',
        'title-romaji',
        'description',
        'pages',
        'volume',
        'publication_date',
        'isbn',
        'cover'
    ];

    public function author()
    {
        return $this->belongsToMany(Author::class);
    }
}

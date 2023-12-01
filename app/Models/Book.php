<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $fillable = [
        'title',
        'isbn',
        'publisher',
        'publish_year',
        'quantity',
        'author_id',
        'genre_id',
        'bookshelves_id',
    ];
}

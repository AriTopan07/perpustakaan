<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookRepository
{
    public function rak_buku()
    {
        return DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('genres', 'books.genre_id', '=', 'genres.id')
            ->select('books.*', 'authors.name as author_name', 'genres.name as genre_name')
            ->orderBy('genre_id', 'ASC')
            ->paginate(12);
    }

    public function get_book_all()
    {
        return DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('genres', 'books.genre_id', '=', 'genres.id')
            ->select('books.*', 'authors.name as author_name', 'genres.name as genre_name')
            ->orderBy('genre_id', 'ASC')
            ->get();
    }
}

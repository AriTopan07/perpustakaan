<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RakRepository
{
    public function data_rak()
    {
        return DB::table('bookshelves')
            ->join('genres', 'bookshelves.genre_id', '=', 'genres.id')
            ->select('bookshelves.*', 'genres.name as genre_name')
            ->get();
    }

    public function rak()
    {
        return DB::table('bookshelves')
            ->join('genres', 'bookshelves.genre_id', '=', 'genres.id')
            ->select('bookshelves.*', 'genres.name as genre_name')
            ->paginate(12);
    }
}

<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GenreRepository
{
    public function data_genre()
    {
        return DB::table('genres')->get();
    }
}

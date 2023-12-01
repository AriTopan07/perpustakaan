<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthorRepository
{
    public function data_author()
    {
        return DB::table('authors')->get();
    }
}

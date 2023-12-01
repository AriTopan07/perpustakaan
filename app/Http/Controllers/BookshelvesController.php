<?php

namespace App\Http\Controllers;

use App\Http\Repository\BookRepository;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class BookshelvesController extends Controller
{
    protected $book;

    public function __construct(BookRepository $bookRepository)
    {
        $this->book = $bookRepository;
    }
    public function list()
    {
        $data = $this->book->rak_buku();
        $genre = Genre::get();

        return view('rak-buku.list', compact('data', 'genre'));
    }
}

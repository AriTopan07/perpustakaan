<?php

namespace App\Http\Controllers;

use App\Http\Repository\BookRepository;

use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $book;

    public function __construct(BookRepository $bookRepository)
    {
        $this->book = $bookRepository;
    }
    public function index()
    {
        $data = $this->book->get_book_all();

        return view('buku.index', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Repository\AuthorRepository;
use App\Http\Repository\BookRepository;
use App\Http\Repository\GenreRepository;
use App\Http\Repository\PermissionRepository;
use App\Http\Repository\RakRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\TempImage;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    protected
        $permission,
        $book,
        $author,
        $genre,
        $rak;

    public function __construct(
        PermissionRepository $permission,
        BookRepository $book,
        AuthorRepository $author,
        GenreRepository $genre,
        RakRepository $rak
    ) {
        $this->permission = $permission;
        $this->book = $book;
        $this->author = $author;
        $this->genre = $genre;
        $this->rak = $rak;
    }
    public function index()
    {
        if ($this->permission->cekAkses(Auth::user()->id, "Buku", "view") !== true) {
            return view('error.403');
        }

        $data = $this->book->get_book_all();
        $author = $this->author->data_author();
        $genre = $this->genre->data_genre();
        $rak = $this->rak->data_rak();

        return view('buku.index', compact('data', 'author', 'genre', 'rak'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'publish_year' => 'required',
            'quantity' => 'required',
            'author_id' => 'required',
            'genre_id' => 'required',
            'bookshelves_id' => 'required'
        ]);

        if ($validator->passes()) {

            $this->book->create($request->all());

            Alert::success('Success', 'Berhasil menambahkan data');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Gagal menambahkan data');
            return redirect()->back();
        }
    }
}

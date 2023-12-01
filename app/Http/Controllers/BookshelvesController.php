<?php

namespace App\Http\Controllers;

use App\Http\Repository\BookRepository;
use App\Http\Repository\GenreRepository;
use App\Http\Repository\RakRepository;
use App\Models\Bookshelf;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BookshelvesController extends Controller
{
    protected
        $book,
        $rak,
        $genre;

    public function __construct(BookRepository $bookRepository, RakRepository $rak, GenreRepository $genre)
    {
        $this->book = $bookRepository;
        $this->rak = $rak;
        $this->genre = $genre;
    }

    public function index()
    {
        $data_rak = $this->rak->data_rak();
        $data_genre = $this->genre->data_genre();

        return view('rak-buku.index', compact('data_rak', 'data_genre'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cover' => 'required',
            'genre_id' => 'required',
        ]);

        if ($validator->passes()) {

            $book = new Bookshelf();
            $book->cover = $request->cover;
            $book->genre_id = $request->genre_id;
            $book->save();

            Alert::success('Success', 'Berhasil menambahkan data');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Gagal menambahkan data');
            return redirect()->back();
        }
    }

    public function rak()
    {
        $rak = $this->rak->rak();

        return view('rak-buku.rak', compact('rak'));
    }

    public function list()
    {
        $data = $this->book->rak_buku();
        $genre = Genre::get();

        return view('rak-buku.list', compact('data', 'genre'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Repository\AuthorRepository;
use App\Http\Repository\BookRepository;
use App\Http\Repository\GenreRepository;
use App\Http\Repository\PermissionRepository;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    protected
        $permission,
        $book,
        $author,
        $genre;

    public function __construct(
        PermissionRepository $permission,
        BookRepository $bookRepository,
        AuthorRepository $author,
        GenreRepository $genre,
    ) {
        $this->permission = $permission;
        $this->book = $bookRepository;
        $this->author = $author;
        $this->genre = $genre;
    }
    public function index()
    {
        if ($this->permission->cekAkses(Auth::user()->id, "Penulis", "view") !== true) {
            return view('error.403');
        }

        $data = $this->author->data_author();

        return view('penulis.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {

            $book = new Author();
            $book->name = $request->name;
            $book->save();

            Alert::success('Success', 'Berhasil menambahkan data');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Gagal menambahkan data');
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\Auth;
use App\Models\TempImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

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

    private function handleImageUpload($tempImage, $type, $book)
    {
        $extArray = explode('.', $tempImage->name);
        $ext = last($extArray);

        $newImageName = $book->id . '-' . time() . '.' . $ext;
        $sPath = public_path() . '/temp/' . $tempImage->name;
        $dPath = public_path() . '/uploads/aplikasi/' . $newImageName;

        File::copy($sPath, $dPath);

        // Update the model with the new image
        $book->$type = $newImageName;
        $book->save();

        // Delete old image
        File::delete(public_path() . '/uploads/aplikasi/' . $tempImage->name);
    }

    public function create($request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->publisher = $request->publisher;
        $book->publish_year = $request->publish_year;
        $book->quantity = $request->quantity;
        $book->author_id = $request->author_id;
        $book->genre_id = $request->genre_id;
        $book->bookshelves_id = $request->bookshelves_id;
        $book->save();

        // save cover
        if (!empty($request->cover_id)) {
            $tempImageCoverBook = TempImage::find($request->cover_id);
            $this->handleImageUpload($tempImageCoverBook, 'cover', $book);
        }
    }
}

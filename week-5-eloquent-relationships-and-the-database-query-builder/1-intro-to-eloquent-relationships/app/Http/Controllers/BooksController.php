<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = Book::with(['user', 'author', 'borrowers'])->latest()->get();

        return view('books.index', [
            'books' => $books
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $authors = Author::select('id', 'name')->get();

        return view('books.create', [
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $storeBookRequest)
    {
        /* $book = new Book();

        $book->name = $storeBookRequest->name;
        $book->description = $storeBookRequest->description;
        $book->category_id = $storeBookRequest->category;
        $book->author_id = $storeBookRequest->author;
        $book->user_id = $storeBookRequest->user()->id;

        $book->save(); */
        // $storeBookRequest->validated();
        /* Book::create([
            'name' => $storeBookRequest->name,
            'description' => $storeBookRequest->description,
            'category_id' => $storeBookRequest->category_id,
            'author_id' => $storeBookRequest->author_id,
            'user_id' => $storeBookRequest->user()->id
        ]); */
        // dd($storeBookRequest->all());

        // dd($imagePath);
        $book = Book::create([
            ...$storeBookRequest->validated(),
            'user_id' => $storeBookRequest->user()->id
        ]);

        if ($book) {
            $imagePath = $storeBookRequest->file('image')->store('books', 'public');
            $book->image = $imagePath;
            $book->save();
        }

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookBorrowerRequest;
use App\Models\Book;
use App\Models\BookRequest;
use App\Models\Borrower;
use Illuminate\Http\Request;

class BookRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookRequests = BookRequest::with(['book', 'borrower'])->latest()->get();

        return view('book-requests.index', [
            'bookRequests' => $bookRequests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::select('id', 'name')->get();
        $borrowers = Borrower::select('id', 'name')->get();

        return view('book-requests.create', [
            'borrowers' => $borrowers,
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookBorrowerRequest $storeBookBorrowerRequest)
    {
        BookRequest::create([
            'book_id' => $storeBookBorrowerRequest->book,
            'borrower_id' => $storeBookBorrowerRequest->borrower,
            'comment' => $storeBookBorrowerRequest->comment,
            'user_id' => $storeBookBorrowerRequest->user()->id
        ]);

        return redirect()->route('book-requests.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

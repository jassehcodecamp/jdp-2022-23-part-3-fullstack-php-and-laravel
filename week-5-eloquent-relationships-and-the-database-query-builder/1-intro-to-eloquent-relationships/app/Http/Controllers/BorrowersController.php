<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerRequest;
use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowers = Borrower::with(['user', 'books'])->latest()->get();

        return view('borrowers.index', [
            'borrowers' => $borrowers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrowers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowerRequest $storeBorrowerRequest)
    {
        Borrower::create([
            ...$storeBorrowerRequest->validated(), 
            'user_id' => $storeBorrowerRequest->user()->id
        ]);

        return redirect()->route('borrowers.index');
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

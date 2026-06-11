<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with([
            'book',
            'member'
        ])->latest()->get();

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::orderBy('title')->get();

        $members = Member::orderBy('name')->get();

        return view('borrowings.create', compact(
            'books',
            'members'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id'      => 'required|exists:books,id',
            'member_id'    => 'required|exists:members,id',
            'borrow_date'  => 'required|date',
            'return_date'  => 'required|date|after_or_equal:borrow_date',
            'status'       => 'required|in:borrowed,returned',
        ]);

        Borrowing::create($validated);

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Borrowing created successfully.');
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
    public function edit(Borrowing $borrowing)
    {
        $books = Book::orderBy('title')->get();

        $members = Member::orderBy('name')->get();

        return view('borrowings.edit', compact(
            'borrowing',
            'books',
            'members'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'book_id'      => 'required|exists:books,id',
            'member_id'    => 'required|exists:members,id',
            'borrow_date'  => 'required|date',
            'return_date'  => 'required|date|after_or_equal:borrow_date',
            'status'       => 'required|in:borrowed,returned',
        ]);

        $borrowing->update($validated);

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Borrowing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Borrowing deleted successfully.');
    }
}
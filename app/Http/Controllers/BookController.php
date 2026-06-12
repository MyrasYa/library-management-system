<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')
            ->latest()
            ->get();

        $categories = Category::orderBy('name')->get();

        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|max:255|unique:books,book_code',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'publish_year' => 'required|digits:4',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'book_code' => 'required|max:255|unique:books,book_code,' . $book->id,
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'publish_year' => 'required|digits:4',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $books = Book::with('category')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%");
            })
            ->latest()
            ->get();

        return response()->json($books);
    }

    public function filter(Request $request)
    {
        $categoryId = $request->category_id;

        $books = Book::with('category')
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->get();

        return response()->json($books);
    }

    public function filterSearch(Request $request)
    {
        $keyword = $request->keyword;
        $categoryId = $request->category_id;

        $books = Book::with('category')

            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%");
            })

            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })

            ->latest()
            ->get();

        return response()->json($books);
    }
}

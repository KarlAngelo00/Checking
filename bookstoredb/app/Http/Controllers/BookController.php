<?php

 
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'published_year' => 'required|integer',
            'genre' => 'required|string',
            'description' => 'nullable|string',
        ]);

        return Book::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'published_year' => 'required|integer',
            'genre' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $book->update($request->all());
        return $book;
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return response()->noContent();
    }
}
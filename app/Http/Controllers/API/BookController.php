<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $q = Book::query()->with('authors');
        if ($search = $request->query('q')) {
            $q->where(function ($qq) use ($search) {
                $qq->where('title', 'ILIKE', '%' . $search . '%')
                    ->orWhere('isbn', 'ILIKE', '%' . $search . '%');
            });
        }
        return $q->paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        $authors = $data['authors'] ?? [];
        unset($data['authors']);

        $book = DB::transaction(function () use ($data, $authors) {
            $b = Book::create($data);
            if (!empty($authors)) {
                $b->authors()->sync($authors);
            }
            return $b->load('authors');
        });

        return response()->json($book, 201);
    }

    public function show(Book $book)
    {
        return $book->load('authors', 'loans');
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validated();
        $authors = $data['authors'] ?? null;
        unset($data['authors']);

        $book->update($data);
        if (!is_null($authors)) {
            $book->authors()->sync($authors);
        }
        return response()->json($book->load('authors'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }

    public function attachAuthors(Request $request, Book $book)
    {
        $ids = $request->validate(['authors' => 'required|array', 'authors.*' => 'integer|exists:authors,id'])['authors'];
        $book->authors()->syncWithoutDetaching($ids);
        return response()->json($book->load('authors'));
    }
}

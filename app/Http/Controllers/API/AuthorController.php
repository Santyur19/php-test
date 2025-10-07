<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::withCount('books')->paginate(15);
    }

    public function store(Request $request)
    {
        $author = Author::create($request->validated());
        return response()->json($author, 201);
    }

    public function show(Author $author)
    {
        return $author->load('books');
    }

    public function update(Request $request, Author $author)
    {
        $author->update($request->validated());
        return response()->json($author);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->noContent();
    }
}

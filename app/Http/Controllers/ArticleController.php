<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('article.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|min:50'
        ]);

        $article = Article::create([
            'user_id' => 2,
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'created_at' => now()
        ]);

        dd($article);

        return response()->json([
            'success' => true,
            'article' => $article
        ]);
    }

    public function edit($id)
    {
        return view('article.edit', Article::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        // TODO
    }

    public function destroy($id)
    {
        // TODO
    }
}

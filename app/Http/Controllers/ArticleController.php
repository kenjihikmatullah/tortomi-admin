<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('views', 'desc')->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $article = Article::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        if ($article == null) {
            // TODO
            return;
        }

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        Article::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body')
            ]);

        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('articles.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $path = null;

        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                $image = $request->file('image');

                $extension = $image->getClientOriginalExtension();
                $userId = Auth::user()->id;
                $now = time();
                $name = "{$userId}_{$now}.{$extension}";

                $isSuccess = Storage::putFileAs('public/articles', $image, $name);
                if ($isSuccess !== false) $path = "articles/{$name}";
            } else {
                // TODO
            }
        }

        $article = Article::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image_path' => $path
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
        $article->transformPath();
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $currentArticle = Article::findOrFail($id);
        $path = $currentArticle->image_path;

        // $request->validate([
        //     'image' => 'required|file|mimes:jpg,jpeg,png',
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                $image = $request->file('image');

                $extension = $image->getClientOriginalExtension();
                $userId = Auth::user()->id;
                $now = time();
                $name = "{$userId}_{$now}.{$extension}";

                $isSuccess = Storage::putFileAs('public/articles', $image, $name); // TODO: just replace the exsiting one
                if ($isSuccess !== false){
                    // Delete old image
                    $oldPath = $path;
                    $oldPath = 'public/' . $oldPath;
                    Storage::delete($oldPath);

                    // Update the path
                    $path = "articles/{$name}";
                }
            } else {
                
            }
        }

        Article::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'image_path' => $path
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

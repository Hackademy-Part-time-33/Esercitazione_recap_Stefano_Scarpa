<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.dashboard', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image')) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $path_name);
        }

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' =>  $path_image,
            'user_id' => auth()->user()->id
        ]);

        $article->categories()->attach($request->categories);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $path_image = $article->image;
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $file_name);
        };

        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path_image,
        ]);

        $article->categories()->sync($request->categories);
        session()->flash('success', 'Articolo Modificato con successo');
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        session()->flash('success', 'Articolo cancellato con successo');
        return redirect()->route('dashboard');
    }
}

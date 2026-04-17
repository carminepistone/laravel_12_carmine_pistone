<?php
namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleEditRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

public function store(ArticleRequest $request)
{
    $article = Article::create([
        'nome'        => $request->nome,
        'ingredienti' => $request->ingredienti,
        'prezzo'      => $request->prezzo,
        'img'         => $request->file('img')->store('images', 'public'),
        'user_id'     => Auth::id(),
    ]);


    $article->categories()->sync($request->categories ?? []);

    return redirect()->route('homepage')->with('successMessage', 'Hai correttamente inserito la ricetta!');
}

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            return redirect()->route('homepage')->with('error', 'Non sei autorizzato!');
        }

        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(ArticleEditRequest $request, Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            return redirect()->route('homepage')->with('error', 'Non sei autorizzato!');
        }

        $article->update([
            'nome'        => $request->nome,
            'ingredienti' => $request->ingredienti,
            'prezzo'      => $request->prezzo,
        ]);

        $article->categories()->sync($request->categories ?? []);

        if ($request->hasFile('img')) {
            $article->update([
                'img' => $request->file('img')->store('images', 'public'),
            ]);
        }

        return redirect()->route('article.index')->with('success', 'Piatto aggiornato!');
    }

    public function destroy(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            return redirect()->route('homepage')->with('error', 'Non sei autorizzato!');
        }

        $article->delete();
        return redirect()->route('article.index')->with('success', 'Piatto eliminato!');
    }
}
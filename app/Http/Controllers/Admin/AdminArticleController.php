<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
    public function index()
    {
        $articles = $this->article->paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.add');
    }

    public function store(Request $request)
    {
        $this->saveArticle($request);

        return redirect()->back();
    }

    public function edit($id)
    {

        $article = $this->article->findOrFail($id);

        return view('admin.article.edit', compact('article'));
    }

    public function saveArticle($request, int $id = null)
    {

        return $this->article->updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'content' => $request->content,
                'title_seo' => $request->title_seo ?? $request->name,
                'description' => $request->description,
                'description_seo' => $request->description_seo ?? $request->description,
            ]

        );
    }

    public function update(Request $request, $id)
    {
        $this->saveArticle($request, $id);

        return redirect()->route('admin.articles.index');
    }

    public function action($action, $id)
    {
        if ($action) {

            $article = $this->article->findOrFail($id);
            switch ($action) {
                case 'delete':
                    $article->delete($id);
                    break;
                case 'active':
                    $article->active = $article->active ? 0 : 1;
                    $article->save();
                    break;
            }
        }

        return redirect()->back();
    }
}

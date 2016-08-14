<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{

    protected $redirectTo = '/';

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return Response
     */
    public function index() {
        return view('articles.list', [
            'articles' => Article::orderBy('created_at', 'desc')->get(),
            'isAdmin'  => false
        ]);
    }

    /**
     * @param $id
     * @return Response
     */
    public function display($id) {
        try {
            $article = Article::findOrFail($id);
            return view('articles.view', [
                'article' => $article
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect($this->redirectTo);
        }
    }
}

<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('/articles/list', [
            'articles' => Article::orderBy('created_at', 'desc')->get(),
            'isAdmin'  => false
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function display($id) {
        try {
            $article = Article::findOrFail($id);
            return view('/articles/view', [
                'article' => $article
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect($this->redirectTo);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticlePostRequest;


class ArticleController extends Controller
{

    protected $redirectTo = '/admin';

    /**
     * ArticleController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        return view('admin.dashboard', [
            'tags'      => Tag::orderBy('create_at', 'desc')->get(),
            'users'     => User::orderBy('created_at', 'desc')->get(),
            'articles'  => $request->user()->articles()->get(),
            'isAdmin'   => true
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) {
        return view('admin.form-article', [
            'article'       => new Article,
            'isNewRecord'   => true
        ]);
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function edit(Request $request, Article $article) {
        try {
            return view('admin.form-article', [
                'article'       => $article,
                'isNewRecord'   => false
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect($this->redirectTo);
        }
    }

    /**
     *
     * @param StoreArticlePostRequest $request
     * @param null $id
     * @return Response
     */
    public function store(StoreArticlePostRequest $request, $id=null) {

        //TODO - create a Form class to handle processing / sanitizing

        $article = [
            'title'     => $request->input('title'),
            'subtitle'  => $request->input('subtitle'),
            'content'   => $request->input('content')   //TODO - remove malicious tags
        ];

        if (null !== $id) {
            try {
                $request->user()->articles()->findOrFail($id)->update($article);
                $message = 'Article updated. Well Done.';
            } catch (ModelNotFoundException $e) {
                return redirect($this->redirectTo);
            }
        } else {
            $request->user()->articles()->create($article);
            $message = 'Successfully posted your Article! Nice one.';
        }


        $request->session()->flash('success', $message);

        return redirect($this->redirectTo);
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function delete(Request $request, Article $article) {

        $this->authorize('destroy', $article);

        $article->delete();

        return redirect($this->redirectTo);
    }
}
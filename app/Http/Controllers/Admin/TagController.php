<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticlePostRequest;


class TagController extends Controller
{

    protected $redirectTo = '/admin';

    /**
     * ArticleController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }


}
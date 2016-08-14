<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $redirectTo = '/admin';

    /**
     * UserController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return redirect($this->redirectTo);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request) {
        return view('admin.form-user', [
            'user'          => new User,
            'isNewRecord'   => true
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, User $user) {
        return view('admin.form-user', [
            'user'          => $user,
            'isNewRecord'   => false
        ]);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $id=null) {

        //TODO - pass request into form class for processing

        $this->validate($request, [
            'name'   => 'required|max:255',
            'email'  => 'required|unique:users,email,'.$id.'|max:255'
        ]);

        //TODO - sanitize inputs before add values to DB
        $user = [
            'name'   => $request->input('name'),
            'email'  => $request->input('email')
        ];

        if (null !== $id) {
            try {
                User::findOrFail($id)->update($user);
            } catch (ModelNotFoundException $e) {
                return redirect($this->redirectTo);
            }
        } else {
            User::create($user);

            // TODO - send user email to /password/reset
        }

        return redirect($this->redirectTo);
    }

    public function delete($id) {

    }
}
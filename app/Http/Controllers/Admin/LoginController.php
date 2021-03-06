<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as MainController;
use Illuminate\Support\Facades\Auth;

class LoginController extends MainController
{
    protected $redirectTo = '/admin/opening';

    public function showLoginForm()
    {
        if(Auth::check()) {
            return redirect()->intended($this->redirectPath());
        }
        return view('auth.login');
    }

    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';
        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin/opening';
    }
}

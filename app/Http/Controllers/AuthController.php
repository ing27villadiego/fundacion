<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $loginView = 'auth.login';
    protected $guard = 'users';

    public function authenticated()
    {
        return Redirect::route('home');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

}

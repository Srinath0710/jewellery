<?php
// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('customer.index');  
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

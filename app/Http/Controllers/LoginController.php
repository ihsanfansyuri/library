<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('login.index', [
      'title' => 'Login'
    ]);
  }

  public function authenticate(LoginRequest $request)
  {
    if (Auth::attempt($request->except(['_method', '_token']))) {
      $request->session()->regenerate();

      return redirect()->intended('/book');
    }

    return back();
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}

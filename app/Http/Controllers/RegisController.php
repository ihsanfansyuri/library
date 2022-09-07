<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequets;
use App\Models\User;

class RegisController extends Controller
{
  public function index()
  {
    return view('register.index', [
      'title' => 'Registration'
    ]);
  }

  public function store(RegisterRequets $request)
  {

    // dd($request->file());

    $validate = $request->all();

    if ($request->file('image-profile')) {
      // $validate['image-profile'] = $request->file('image-profile');
      $request->file('image-profile')->store('profile-path');

      // $profile->move(public_path('profile-path'), $profile->getClientOriginalName());
    }

    $validate['password'] = bcrypt($validate['password']);

    User::create($validate);

    return redirect(route('login.index'));
  }
}

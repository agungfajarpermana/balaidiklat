<?php

namespace App\Http\Controllers;

use App\Http\Requests\ErrorFormLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('layouts/login');
  }

  public function login(ErrorFormLogin $request)
  {
    if($request->ajax()){
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        return response()->json([
          'success' => 'berhasil'
        ]);
      }else{
        return response()->json([
          'msg' => 'gagal'
        ]);
      }
    }
  }

  public function logout()
  {
    Auth::logout();

    return view('layouts.login');
  }
}

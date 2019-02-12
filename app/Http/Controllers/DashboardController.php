<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormChangeUsername;
use App\Http\Requests\ErrorFormChangePassword;

class DashboardController extends Controller
{
    public function changeuser()
    {
        return view('layouts.change_user');
    }

    public function changepass()
    {
        return view('layouts.change_pass');
    }

    public function getuser()
    {
        $output = '';
        $users = User::all();

        $output .= '<option value="">Pilih</option>';
        foreach($users as $key => $user){
            $output .= '<option value="'.$user->email.'">'.$user->email.'</option>';
        }
        return response()->json($output);
    }

    public function createuser(ErrorFormChangeUsername $request)
    {
        if(!$request->ajax()) dd('Woow, hayo mau ngapain!');

        $update = User::where('email', $request->user)->update([
            'email' => $request->newuser
        ]);

        if($update){
            return response()->json(['status'=>true,'msg'=>'Berhasil diubah!']);
        }
    }

    public function createpass(ErrorFormChangePassword $request){
        if(!$request->ajax()) dd('Woow, hayo mau ngapain!');

        $update = User::where('email', $request->user)->update([
            'password' => bcrypt($request->password)
        ]);

        if($update){
            return response()->json(['status'=>true,'msg'=>'Berhasil diubah!']);
        }
    }

    public function logoutowner()
    {
        Auth::logout();

        return view('layouts.login');
    }
}

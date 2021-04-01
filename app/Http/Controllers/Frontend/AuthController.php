<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function form()
    {
        return view('frontends.users.form');
    }
    public function rand(){
        return view('frontends.users.rand_code');
    }


    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:3'
         ],[
            'email.required'=>'is not allowed to be empty!',
            'email.email'=>'Email invalidate!',
            'password.required'=>'is not allowed to be empty!',
            'password.min'=>'password is too short!'
         ]);
        $credentials = $request->only('email', 'password');

        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('fontend.cart.order');
            // dd(Auth::check());
    }
}

    public function register(Request $request){
        $request->validate([
            'name'=>'required|min:3|alpha',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3',
            'password_confim'=>'required|same:password'
         ],[
            'name.required'=>'is not allowed to be empty!',
            'name.min'=>'name is too short!',
            'name.alpha'=>'Malformed name!',
            'email.required'=>'is not allowed to be empty!',
            'email.email'=>'Email invalidate!',
            'email.unique'=>'Email already exists!',
            'password.required'=>'is not allowed to be empty!',
            'password.min'=>'password is too short!',
            'password_confim.required'=>'is not allowed to be empty!',
            'password_confim.same' => 'password confim is not the same!'
         ]);

         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->save();
    }

    public function logout(){
         Auth::logout();
        dd(Auth::check());
    }

    public function forgotFassword(){

    }

}

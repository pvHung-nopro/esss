<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // // protected $redirectTo = RouteServiceProvider::HOME;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
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
       $a = Auth::check();
       dd($a);
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Mail;
use Illuminate\Support\Facades\Cookie;


use Symfony\Component\HttpKernel\Event\ResponseEvent;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    public function verfication_code(Request $request)
    {
        $v = Validator::make($request->all(), [
            // 'name' => 'required|min:3',
            // 'email' => 'required|email|unique:users',

            'email' => 'required|email',
            // 'password'  => 'required|min:3|confirmed',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'no register',
                'code' => 422
            ], 422);
        }
        try{
            $b = session()->get('rand_code');
            if(!isset($b)){
            $to_name = "eshoppe";
            $to_email = "$request->email";//send to this email
             $rand_code = rand(100000,999999);

               session()->put('rand_code',$rand_code);
               $session_rand = session()->get('rand_code');

            $data =  [
                'rand_code'=>  $session_rand,
            ] ;



            Mail::send('frontends.users.mail_register',$data,function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('MÃ XÁC MINH');//send this mail with subject
                $message->from($to_email,$to_name);//send from this mail
            });

            //     return response()->json([
            //     'status' => true,
            //     'message' => 'submitted successfully',
            //     'cokie' =>   $session_rand ,
            //     'rand_code' => $rand_code,

            //    ], 200);
            // session()->forget('rand_code');
            }
            else   if(isset($b))
               {
                   $a = session()->get('rand_code');
                // session()->forget('rand_code');
                    if($a == $request->rand){
                        $user = new User();
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->password = bcrypt($request->password);
                        $user->save();

                        return response()->json([
                            'status' => true,
                            'message' => 'Sign Up Success',
                           ], 200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Sign Up Success',
                            'token' => $a,
                           ], 200);
                    }
               }
            }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ],401);
        }

    }






    public function register(Request $request)
    {
  try{
    $v = Validator::make($request->all(), [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password'  => 'required|min:3',
        'passwordConfim' => 'required|same:password'
    ]);
    if ($v->fails())
    {
        return response()->json([
            'status' => false,
            'message' => 'no register',
            'code' => 422
        ], 422);
    }
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    return response()->json([
        'status' => true,
        'message' => 'Sign Up Success',
       ], 200);
  }catch(\Exception $e){
        return response()->json([
           'status'=>false,
           'message'=>$e->getMessage(),
        ],401);
  };

    }


    public function login(Request $request)
    {

        $v = Validator::make($request->all(), [
            'email' => 'required|email',
            'password'  => 'required|min:3|',
        ]);
        if ($v->fails()){
            return response()->json([
                'success' => false,
                'status' => 'validate'
           ],401);
        }
        $credentials = $request->only('email', 'password');

        // return response()->json($credentials) ;
        if (!$token = $this->guard()->attempt($credentials)) {
            return response()->json([
                 'success' => false,
            ],401);
        }

       return response()->json([
             'success'=> true,
             'token'=>$token,
             'id'=>auth()->user()
       ],200);
    }

    public function checkToken(){
            return response()->json([
                'success'=>true
            ],200);
    }

    public function me()
    {
        return response()->json($this->guard()->user());
    }



    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['success'=>true],200);
    }

    public function refresh()
    {
        try{
            return $this->respondWithToken($this->guard()->refresh());
        }
        catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => false,
                'code' => 500
            ]) ;
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' =>  $this->guard()->factory()->getTTL() * 60,
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
        protected function redirectTo(){
            if(Auth()->user()->role==1){
                return route(lecturer.talents_feed);
            }
            elseif(Auth()->user()->role==2){
                return route(student.find_jobs);
            }
        }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //override login function, check and validate email and password
    public function login(Request $request){
        $input = $request->all();
        $this ->validate($request,[
            'email'=> 'required|email',
            'password'=>'required',
            
            
        ]);
        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))){
            //if credentials are correct, check user role and redirect to the correct dashboard
            if(auth()->user()->role==1){
                return redirect()->route('lecturer.talents_feed');
            }
            elseif(auth()->user()->role==2){
                return redirect()->route('student.find_jobs');
            }
        }else{
            //if credentials are wrong, redirect user to login page with error message
            return redirect()->route('login')->with('error', 'Email and password are wrong. Please try again.');
        }
    }
}

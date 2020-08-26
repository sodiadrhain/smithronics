<?php

namespace site\Http\Controllers\Auth;

use site\User;
use Validator;
use site\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use site\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Auth\Event\Registered;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */


    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);


    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected $loginPath = '/users/login';
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'phone' => 'required|min:11|max:11',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */



     public function redirectPath(){

           $user = Auth::user();
       if($user->hasRole('manager')){
        alert()->success('Thankyou', 'Login Is Successful')->autoclose('3600');
       return ('/admin');
     } else{
       if(isset($_GET['previous'])){
          $ddprev = $_GET['previous'];
          alert()->success('Thankyou', 'Login Is Successful')->autoclose('3600');
          return ($ddprev);
       }
      else {
        alert()->success('Thankyou', 'Login Is Successful')->autoclose('3600');
        return ('/');
      }
     }
     }



    protected function create(array $data)
    {
        $cuser = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);

        $cuser->save();


    }
}

<?php

namespace site\Http\Controllers;

use Illuminate\Http\Request;
use site\User;
use Validator;
use site\Http\Requests;
use site\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Mail;
use DB;


class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
          'email' => 'required|exists:users',
      ];

      $input = Input::only('email');

      $validator = Validator::make($input, $rules);

      if($validator->fails())
      {
          return Redirect::back()->withInput()->withErrors($validator);
      } else {

      $credentials = Input::get('email');
        $categoriesx = DB::table('users')->where('email', $credentials)->first();
        $coff = $categoriesx->confirmed;
            $coffp = $categoriesx->confirmation_code;
            $uname = $categoriesx->name;
            $sur_name = $categoriesx->sur_name;
            $first_name = $categoriesx->first_name;
            $uemail = $categoriesx->email;
            $utoken = str_random(30);
            $utime = date("Y-m-d H:i:s");
        if($coff == 0){
          return Redirect::back()
              ->withInput()
              ->withErrors('This account has not been verified, Kindly Login or Register');
        }
        else{
            if($coff == 1){
            $check_token = DB::table('password_resets')->where(['email' => $uemail])->get();
            if(count($check_token) >= 1){
              DB::table('password_resets')->where(['email' => $uemail])->delete();
            }

            DB::table('password_resets')->insert(['email' => $uemail, 'token' => $utoken, 'created_at' => $utime]);

$headers = "MIME-Version: 1.0\r\n"; 

$headers = "Content-Type: text/html; charset=UTF-8\r\n"; 


Mail::send('users.forgot_verify', array(
              'surname' => $sur_name,
              'firstname' => $first_name,
              'email' => $uemail,
              'token' => $utoken
            ), function($message) {
                   $message->to(Input::get('email'), Input::get('email'))->subject('Password Reset Details')->getHeaders()->addTextHeader('Content-Type: text/html; charset=UTF-8\r\n; MIME-Version: 1.0\r\n', 'true'); 
               });

            }

             return Redirect::back()
                 ->withInput()
                 ->with([
                     'status' => 'Details to reset your password has been sent to your Email.'
                 ]);

    }
    }
    }


    public function confirm($token)
    {
    if( ! $token)
    {
  return view('errors.404');
    }  else{
    $userx = DB::table('password_resets')->where('token', $token)->first();

    if ( ! $userx)
    {
  return view('errors.404');
} else{
    $userxe = $userx->email;
    return view('users.forgot_new', compact('userxe'));
  }
}
    }

    public function confirm_2(Request $request)
    {
          $rules = [
            'password' => 'required|confirmed|min:10'
              ];
              $input = Input::only(
                'password',
                'password_confirmation'
              );
              $validator = Validator::make($input, $rules);
              if($validator->fails()){
                return Redirect::back()->withInput()->withErrors($validator);
}
      $uemail = $request->get('email');
      $upass = bcrypt(Input::get('password'));
      $categories = DB::table('users')->where('email', $uemail)->update(['password' => $upass]);

      $newtoken = null;
      $categoriesb = DB::table('password_resets')->where('email', $uemail)->update(['token' => $newtoken]);

         alert()->success('Kindly Login', 'Your password has been successfully changed')->persistent('Close');
    return redirect('/users/login');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      return view('users.forgot');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

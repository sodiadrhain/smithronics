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

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('auth.register');
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
      'sur_name' => 'required|max:255',
      'first_name' => 'required|max:255',
      'other_name' => 'required|max:255',
      'day' => 'required',
      'month' => 'required',
      'year' => 'required|numeric|min:4',
      'state_of_origin' => 'required|max:15',
      'lga' => 'required|max:255',
      'sex' => 'required',
      'marital_status' => 'required',
      'religion' => 'required',
      'nature_of_business' => 'required',
      'residential_address' => 'required|max:255',
      'office_address' => 'required|max:255',
      'purpose_of_joining' => 'required',
      'payment_option' => 'required',
      'next_kin_name' => 'required|max:255',
      'next_kin_day' => 'required',
      'next_kin_month' => 'required',
      'next_kin_year' => 'required|numeric|min:4',
      'next_kin_relationship' => 'required|max:255',
      'next_kin_phone' => 'required|min:11|max:11',
      'phone' => 'required|min:11|max:11',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|confirmed|min:10',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];
    $input = Input::only(
      'sur_name',
      'first_name',
      'other_name',
      'day',
      'month',
      'year',
      'state_of_origin',
      'lga',
      'sex',
      'marital_status',
      'religion',
      'nature_of_business',
      'residential_address',
      'office_address',
      'payment_option',
      'next_kin_name',
      'next_kin_day',
      'next_kin_month',
      'next_kin_year',
      'next_kin_relationship',
      'next_kin_phone',
      'email',
      'phone',
      'password',
      'image',
      'password_confirmation'
    );

    $validator = Validator::make($input, $rules);
    if($validator->fails()){
      return Redirect::back()->withInput()->withErrors($validator);

    }

    $confirmation_code = str_random(30);
    $sur_name = Input::get('sur_name');
    $first_name = Input::get('first_name');
    $uemail = Input::get('email');
    $uphone = Input::get('phone');
    $file1 = $request->file('image');
    $name1 = $file1->getClientOriginalName();
    $name1 = time().$name1;
    $file1->move(public_path() . '/uploads/users/', $name1);
    $imagePath = '/uploads/users/'.$name1;

    User::create([
      'sur_name' => ucfirst(Input::get('sur_name')),
      'first_name' => ucfirst(Input::get('first_name')),
      'other_name' => ucwords(Input::get('other_name')),
      'state_of_origin' => ucfirst(Input::get('state_of_origin')),
      'lga' => ucfirst(Input::get('lga')),
      'nature_of_business' => ucfirst(Input::get('nature_of_business')),
      'residential_address' => ucfirst(Input::get('residential_address')),
      'office_address' => ucfirst(Input::get('office_address')),
      'next_kin_name' => ucwords(Input::get('next_kin_name')),
      'next_kin_relationship' => ucfirst(Input::get('next_kin_relationship')),
      'day' => Input::get('day'),
      'month' => Input::get('month'),
      'year' => Input::get('year'),
      'sex' => Input::get('sex'),
      'marital_status' => Input::get('marital_status'),
      'religion' => Input::get('religion'),
      'payment_option' => Input::get('payment_option'),
      'next_kin_day' => Input::get('next_kin_day'),
      'next_kin_month' => Input::get('next_kin_month'),
      'next_kin_year' => Input::get('next_kin_year'),
      'next_kin_phone' => Input::get('next_kin_phone'),
      'email' => Input::get('email'),
      'phone' => Input::get('phone'),
      'image' => $imagePath,
      'password' => bcrypt(Input::get('password')),
      'confirmation_code' => $confirmation_code
    ]);
    $check_user = DB::table('users')->where('email', $uemail)->first();
    $check_user = $check_user->id;
    $utime = date("Y-m-d H:i:s");
    $content =  "Welcome on board:::<br>We are pleased to have you join us at smithronics.com<br>Your account will be reviewed soon and you will get a reply when our staff confirms the information entered during registration is very correct<br>Should you have any issues? Do reach us via: <a href='mailto:support@smithronics.com'>support@smithronics.com</a><br><br>THANKYOU";
    $title = "WELCOME MAIL (SMITHRONICS INTEGRATED ENTERPRISES)";
    DB::table('messages')->insert(['sender_id' => 0, 'receiver_id' => $check_user, 'content' => $content, 'created_at' => $utime, 'title' => $title]);
    Mail::send('users.verify', array(
      'surname' => $sur_name,
      'firstname' => $first_name,
      'email' => $uemail,
      'confirmation_code' => $confirmation_code
    ), function($message) {
           $message->to(Input::get('email'), Input::get('email'))->subject('Welcome to smithronics.com');
       });

    alert()->success('Please Check your Email for a Confirmation Link', 'Registration Is Successful')->persistent('Close');
    return redirect('/users/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    public  function re_confirm_1(){

      return view('users.resend');
    }

      public function re_confirm_2()
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
              if($coff == 1){
                return Redirect::back()
                    ->withInput()
                    ->with([
                        'status' => 'Your account have already been verified already, Kindly Login.'
                    ]);
              }
              else{

                Mail::send('users.verify', array(
                  'surname' => $sur_name,
                  'firstname' => $first_name,
                  'email' => $uemail,
                  'confirmation_code' => $coffp
                ), function($message) {
                       $message->to(Input::get('email'), Input::get('email'))->subject('Welcome to smithronics.com');
                   });

                   return Redirect::back()
                       ->withInput()
                       ->with([
                           'status' => 'Your verification link has been sent, make sure you check your SPAM or JUNK folders if not seen in INBOX'
                       ]);

            }
          }
        }

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {

           alert()->error('Check your email again', 'Verification Code does not exist')->persistent('Close');
    return redirect('/users/register');
        } else{

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            alert()->error('Kindly Login or Register', 'Verification Code already used')->persistent('Close');
    return redirect('/users/register');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

           alert()->success('Thankyou', 'You have successfully verified your account')->persistent('Close');
    return redirect('/users/login');
    }
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

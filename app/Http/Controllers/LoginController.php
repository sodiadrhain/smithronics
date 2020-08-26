<?php
namespace site\Http\Controllers;
use Illuminate\Http\Request;
use site\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use site\Http\Requests;
use site\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
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
     public function store()
       {
           $rules = [
               'email' => 'required|exists:users',
               'password' => 'required'
           ];

           $input = Input::only('email', 'password');

           $validator = Validator::make($input, $rules);

           if($validator->fails())
           {
               return Redirect::back()->withInput()->withErrors($validator);
           } else {

           $deactivated = [
               'email' => Input::get('email'),
               'password' => Input::get('password'),
               'deactivated' => 0
           ];
                        $credentials = [
                  'email' => Input::get('email'),
                  'password' => Input::get('password'),
                  'confirmed' => 1
              ];
              
           if (!Auth::attempt($deactivated))
                      {
                          return Redirect::back()
                              ->withInput()
                              ->withErrors([
                                  'deactivated' => 'Your account has been deactivated or invalid login details, Try logging again or if it persists, Kindly Contact Us for more information.'
                              ]);


              } elseif (!Auth::attempt($credentials))
           {
               return Redirect::back()
                   ->withInput()
                   ->withErrors([
                       'credentials' => 'We were unable to sign you in.'
                   ]); }
       else{
             $user = Auth::user();
            if($user->hasRole('manager')){
            alert()->success('Thankyou', 'Login Is Successful')->autoclose('3600');
            return redirect('/admin');
          }if($user->hasRole('staff')){
            alert()->success('Thankyou', 'Login Is Successful')->autoclose('3600');
            return redirect('/staff');
            } else{
            if(isset($_GET['previous'])){
            $ddprev = $_GET['previous'];
            alert()->success('Thankyou', 'Login Is Successful')->autoclose('3600');
            return redirect($ddprev);
            }
            else {
            alert()->success('Thankyou', 'Login Is Successful')->autoclose('3600');
            return redirect('/');
            }

           }
         }
         }



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

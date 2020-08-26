<?php

namespace site\Http\Controllers\Staff;

use site\Role;
use Illuminate\Http\Request;
use Validator;
use site\Http\Requests;
use site\Http\Controllers\Controller;
use site\User;
use site\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Input;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('staffend.users.index', compact('users'));
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
        //
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
      $user = User::whereId($id)->firstOrFail();
      $roles = Role::all();
      $selectedRoles = $user->roles->lists('id')->toArray();
      return view('staffend.users.edit', compact('user', 'roles', 'selectedRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserEditFormRequest $request)
    {
        $user = User::whereId($id)->firstOrFail();
        $image = $user->image;
        $user->sur_name = $request->get('sur_name');
        $user->first_name = $request->get('first_name');
        $user->other_name = $request->get('other_name');
        $user->state_of_origin = $request->get('state_of_origin');
        $user->lga = $request->get('lga');
        $user->nature_of_business = $request->get('nature_of_business');
        $user->residential_address = $request->get('residential_address');
        $user->office_address = $request->get('office_address');
        $user->next_kin_name = $request->get('next_kin_name');
        $user->next_kin_relationship = $request->get('next_kin_relationship');
        $user->day = $request->get('day');
        $user->month = $request->get('month');
        $user->year = $request->get('year');
        $user->sex = $request->get('sex');
        $user->marital_status = $request->get('marital_status');
        $user->religion = $request->get('religion');
        $user->payment_option = $request->get('payment_option');
        $user->next_kin_day = $request->get('next_kin_day');
        $user->next_kin_month = $request->get('next_kin_month');
        $user->next_kin_year = $request->get('next_kin_year');
        $user->next_kin_phone = $request->get('next_kin_phone');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $GetImage = $request->hasFile('image');
        if($GetImage == TRUE){
          $file1 = $request->file('image');
          $name1 = $file1->getClientOriginalName();
          $name1 = time().$name1;
          $file1->move(public_path() . '/uploads/users/', $name1);
          $user->image = '/uploads/users/'.$name1;
        } else{
          $user->image = $image;
        }
        $password = $request->get('password');
        if($password != ""){
            $user->password = Hash::make($password);
        }
        $user->save();
        $user->saveRoles($request->get('role'));

        return redirect(action('Staff\UsersController@edit', $user->id))->with('status', 'The user details has been updated!');
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
    public function orders($id)
    {
        $user = User::whereId($id)->firstOrFail();
        return view('staffend.users.orders', compact('user','id'));
    }
    public function payments($id)
    {
      $user = User::whereId($id)->firstOrFail();
      return view('staffend.users.payments', compact('user','id'));
    }
    public function message($id)
    {
      $user = User::whereId($id)->firstOrFail();
      return view('staffend.users.message', compact('user','id'));
    }
    public function send_message($id, Request $request)
    {
      $rules = [
      'title'=> 'required|min:5',
      'content'=> 'required|min:5'
      ];
      $input = Input::only(
        'title',
        'content'
      );
      $validator = Validator::make($input, $rules);
      if($validator->fails()){
        return Redirect::back()->withInput()->withErrors($validator);

      }
      $user = User::whereId($id)->firstOrFail();
      $utime = date("Y-m-d H:i:s");
      $content = $request->get('content');
      $title = strtoupper($request->get('title'))." "."(SMITHRONICS INTEGRATED ENTERPRISES)";
      DB::table('messages')->insert(['sender_id' => 1, 'receiver_id' => $id, 'content' => $content, 'created_at' => $utime, 'title' => $title]);
      return redirect(action('Staff\UsersController@message', $user->id))->with('status', 'Message Has Been Sent Successfully!');
    }
    public function search(Request $request)
    {
      $users = User::all();
      $query = Input::get('search');
      if(isset($query)){
        $post = DB::table('users')->where('first_name', 'like', '%' . $query . '%')->get();
        return view('staffend.users.index', compact('post', 'query', 'users'));
      } else{
      $post = "";
      return view('staffend.users.index', compact('users','post'));
    }
  }

    public function activate($id)
    {
      DB::table('users')->where('id', $id)->update(['activated' => 1]);
      $utime = date("Y-m-d H:i:s");
      $content =  "Account has been activated:::<br>Based on the initial messsage you got from us,<br>Your account has been fully reviewed by one of our staff and it is found worthy;<br>This account is now fully able to make orders and purchases from this website.<br>Should you have any issues? Do reach us via: <a href='mailto:support@smithronics.com'>support@smithronics.com</a><br><br>THANKYOU";
      $title = "ACCOUNT ACTIVATION (SMITHRONICS INTEGRATED ENTERPRISES)";
      DB::table('messages')->insert(['sender_id' => 0, 'receiver_id' => $id, 'content' => $content, 'created_at' => $utime, 'title' => $title]);
      return redirect(action('Staff\UsersController@index'))->with('status', 'User Has Been Activated!');
    }
}

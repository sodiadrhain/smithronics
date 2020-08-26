<?php

namespace site\Http\Controllers;

use site\Role;
use Illuminate\Http\Request;

use site\Http\Requests;
use site\Http\Controllers\Controller;
use site\User;
use site\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function profile()
    {
      return view('users.profile');
    }



    public function view($id)
    {
      $post = User::whereId($id)->firstOrFail();
      return view('users.view', compact('post'));
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

    }

    public function inbox()
    {
      return view('users.inbox');
    }
    public function inbox_read($id)
    {
      $id = $id;
      $utime = date("Y-m-d H:i:s");
      DB::table('messages')->where('id', $id)->update(['status' => 1, 'updated_at' => $utime]);
      return view('users.inbox_read', compact('id'));
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

<?php

namespace site\Http\Controllers;

use Illuminate\Http\Request;
use site\User;
use site\Http\Requests;
use Illuminate\Support\Facades\Input;
use site\Http\Controllers\Controller;
use DB;
use site\Post;
use Illuminate\Pagination\Paginator;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  $q = Input::get ( 'q' );
  $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
  if(count($user) > 0)
  return view('search')->withDetails($user)->withQuery ( $q );
  else return view ('search')->withMessage('No Details found. Try to search again !');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
      $query = Input::get('search');
      if(isset($query)){
        $post = DB::table('posts')->where('title', 'like', '%' . $query . '%')->get();
        return view('search', compact('post', 'query'));
      } else{
       return view('search');

      }


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

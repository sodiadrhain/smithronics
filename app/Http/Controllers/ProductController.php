<?php

namespace site\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use site\Http\Requests;
use site\Http\Controllers\Controller;
use site\Post;
use site\Category;
use site\Comment;
use site\User;
use site\Http\Requests\CategoryFormRequest;
use site\Http\Controllers\Auth;
use Illuminate\Support\Facades\Input;
use Mail;
use DB;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
      $posts = Post::whereSlug($slug)->firstOrFail();
      $comments = $posts->comments()->get();
      return view('product.index', compact('posts', 'comments', 'id', 'slug'));
    }

    public function checkout($slug)
    {
      $posts = Post::whereSlug($slug)->firstOrFail();
      return view('product.checkout', compact('posts', 'slug'));
    }
    public function payment($slug)
    {
      $posts = Post::whereSlug($slug)->firstOrFail();
      return view('product.payment', compact('posts', 'slug'));
    }

    public function pay_item()
    {
      $rules = [
          'amount' => 'required|min:3',
      ];

      $input = Input::only('amount');

      $validator = Validator::make($input, $rules);
      if($validator->fails())
      {
          return Redirect::back()->withInput()->withErrors($validator);
      } else{
      $post_slug = Input::get('post_slug');
      $utime = date("Y-m-d H:i:s");
      $alt_phone = Input::get('alt_phone');
      $delivery_address = Input::get('delivery_address');
      $delivery_state = Input::get('delivery_state');
      $delivery_address_type = Input::get('delivery_address_type');
      $user_id = Input::get('user_id');
       $post_id = Input::get('post_id');
       $user_email = Input::get('user_email');
       $user_phone = Input::get('user_phone');
       $user_first_name = Input::get('user_first_name');
       $user_sur_name = Input::get('user_sur_name');
      $amountr = Input::get('amount')+00;

      DB::table('order_list')->insert(['alt_phone' => $alt_phone, 'delivery_address' => $delivery_address, 'delivery_state' => $delivery_state, 'delivery_address_type' => $delivery_address_type, 'user_id' => $user_id, 'post_id' => $post_id, 'created_at' => $utime]);
      $posts2 = DB::table('order_list')->where(['post_id' => $post_id, 'user_id' => $user_id])->latest()->first();
      $order_id = $posts2->id;

      return view('product.make_pay', compact('amountr', 'user_sur_name', 'user_first_name', 'user_email', 'user_phone', 'post_slug', 'order_id'));

}
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function payment_receipt()
     {
       return view('product.receipt');
     }

    public function orders()
    {
      return view('users.orders');
    }
    public function order_details($id)
    {
      $id = $id;
      return view('users.orders_details', compact('id'));
    }
    public function order_details_post()
    {
      $rules = [
          'amount' => 'required|min:3',
      ];

      $input = Input::only('amount');

      $validator = Validator::make($input, $rules);
      if($validator->fails())
      {
          return Redirect::back()->withInput()->withErrors($validator);
      } else{
      $order_id = Input::get('order_id');
      $post_slug = Input::get('post_slug');
      $utime = date("Y-m-d H:i:s");
      $alt_phone = Input::get('alt_phone');
      $delivery_address = Input::get('delivery_address');
      $delivery_state = Input::get('delivery_state');
      $delivery_address_type = Input::get('delivery_address_type');
      $user_id = Input::get('user_id');
       $post_id = Input::get('post_id');
       $user_email = Input::get('user_email');
       $user_phone = Input::get('user_phone');
       $user_first_name = Input::get('user_first_name');
       $user_sur_name = Input::get('user_sur_name');
      $amountr = Input::get('amount')+00;

      DB::table('order_list')->where('id', $order_id)->update(['alt_phone' => $alt_phone, 'delivery_address' => $delivery_address, 'delivery_state' => $delivery_state, 'delivery_address_type' => $delivery_address_type, 'updated_at' => $utime]);

      return view('product.make_pay', compact('amountr', 'user_sur_name', 'user_first_name', 'user_email', 'user_phone', 'post_slug', 'order_id'));
}
  }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function order_details_post_2()
     {
       $rules = [
           'amount' => 'required|min:3',
       ];

       $input = Input::only('amount');

       $validator = Validator::make($input, $rules);
       if($validator->fails())
       {
           return Redirect::back()->withInput()->withErrors($validator);
       } else{
       $order_id = Input::get('order_id');
       $post_slug = Input::get('post_slug');
       $utime = date("Y-m-d H:i:s");
       $user_id = Input::get('user_id');
        $post_id = Input::get('post_id');
        $user_email = Input::get('user_email');
        $user_phone = Input::get('user_phone');
        $user_first_name = Input::get('user_first_name');
        $user_sur_name = Input::get('user_sur_name');
       $amountr = Input::get('amount')+00;

       DB::table('order_list')->where('id', $order_id)->update(['updated_at' => $utime]);

       return view('product.make_pay', compact('amountr', 'user_sur_name', 'user_first_name', 'user_email', 'user_phone', 'post_slug', 'order_id'));
   }
   }

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
     public function show($slug)
     {
       $post = Category::whereSlug($slug)->firstOrFail();
       return view('product.show', compact('slug'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify_payment()
    {
     return view('product.verify');
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

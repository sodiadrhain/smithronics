<?php

namespace site\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use site\Http\Requests;
use site\Http\Controllers\Controller;
use site\Category;
use site\Post;
use site\Comment;
use Illuminate\Support\Str;
use site\Http\Requests\PostFormRequest;
use site\Http\Requests\PostEditFormRequest;
use DB;
use Illuminate\Support\Facades\Input;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
      $get1=$request->hasFile('image1');
      $get2=$request->hasFile('image2');
      $get3=$request->hasFile('image3');
      $file1 = $request->file('image1');
      $name1 = $file1->getClientOriginalName();
      $name1 = time().$name1;
      $file1->move(public_path() . '/uploads/products/', $name1);
      $image1Path = '/uploads/products/'.$name1;
      if($get2 == TRUE){
        $file2 = $request->file('image2');
        $name2 = $file2->getClientOriginalName();
        $name2 = time().$name2;
        $file2->move(public_path() . '/uploads/products/', $name2);
        $image2Path = '/uploads/products/'.$name2;
      } else{
        $image2Path = '/uploads/products/'.$name1;
      }
      if($get3 == TRUE){
        $file3 = $request->file('image3');
        $name3 = $file3->getClientOriginalName();
        $name3 = time().$name3;
        $file3->move(public_path() . '/uploads/products/', $name3);
        $image3Path = '/uploads/products/'.$name3;
      } else{
        $image3Path = '/uploads/products/'.$name1;
      }

$slug = Str::slug($request->get('title'), '-');
$sid =
$slug = $slug.'-'.$request->get('price');
        $post = new Post(array(
          'title' => $request->get('title'),
          'content' => $request->get('content'),
          'price' => $request->get('price'),
          'user_id' => $request->get('user_id'),
          'slug' => $slug,
          'image1' => $image1Path,
          'image2' => $image2Path,
          'image3' => $image3Path,
        ));

        $post->save();
        $post->categories()->sync($request->get('categories'));

        return redirect('/admin/posts/create')->with('status', 'Product is added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $post = Post::whereSlug($slug)->firstOrFail();
      $comments = $post->comments()->get();
      return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::whereId($id)->firstOrFail();
        $categories = Category::all();
        $selectedCategories = $post->categories->lists('id')->toArray();;
        return view('backend.posts.edit', compact('post', 'categories', 'selectedCategories'));
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
      $post = Post::whereId($id)->firstOrFail();
      $post->title = $request->get('title');
      $post->price = $request->get('price');
      $post->content = $request->get('content');
      $post->slug = Str::slug($request->get('title'), '-');
      $get1=$request->hasFile('image1');
      $get2=$request->hasFile('image2');
      $get3=$request->hasFile('image3');
      if($get1 == TRUE){
      $file1 = $request->file('image1');
      $name1 = $file1->getClientOriginalName();
      $name1 = time().$name1;
      $file1->move(public_path() . '/uploads/products/', $name1);
      $post->image1 = '/uploads/products/'.$name1; } else{
        $post->image1 = $post->image1;
      }

      if($get2 == TRUE){
        $file2 = $request->file('image2');
        $name2 = $file2->getClientOriginalName();
        $name2 = time().$name2;
        $file2->move(public_path() . '/uploads/products/', $name2);
        $post->image2 = '/uploads/products/'.$name2; } else{
          $post->image2 = $post->image2;
        }
      if($get3 == TRUE){
        $file3 = $request->file('image3');
        $name3 = $file3->getClientOriginalName();
        $name3 = time().$name3;
        $file3->move(public_path() . '/uploads/products/', $name3);
        $post->image3 = '/uploads/products/'.$name3; } else{
          $post->image3 = $post->image3;
        }
      $post->save();
      $post->categories()->sync($request->get('categories'));
      return redirect(action('Admin\PostsController@edit', $post->id))->with('status', 'Product has been updated!');
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
    public function unavailable($id)
    {
      DB::table('posts')->where('id', $id)->update(['available' => 0]);
      return redirect(action('Admin\PostsController@index'))->with('status', 'Post has been made unavailable!');
    }
    public function available($id)
    {
      DB::table('posts')->where('id', $id)->update(['available' => 1]);
      return redirect(action('Admin\PostsController@index'))->with('status', 'Post has been made available!');
    }
    public function search(Request $request)
    {
      $query = Input::get('search');
      if(isset($query)){
        $post = DB::table('posts')->where('title', 'like', '%' . $query . '%')->get();
        return view('backend.posts.index', compact('post', 'query'));
      } else{
      $post = "";
      return view('backend.posts.index', compact('post'));
    }
    }
}

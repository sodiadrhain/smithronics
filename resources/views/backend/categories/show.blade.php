@extends('master-admin')
@section('title', 'View Category')
@section('content')
<?php
$categories = DB::table('categories')->where('slug', $slug)->first();
$pid = $categories->id;
  echo $categories->name;
  echo "<br>";
  echo $categories->slug;
echo "<br>";

 $posts = DB::table('category_post')->where('category_id', $pid)->get();
 foreach ($posts as $post){
 $as = $post->post_id;

 $posteds = DB::table('posts')->where('id', $as)->get();
 foreach ($posteds as $posted){
 echo $posted->title;
 echo " - ";
 echo $posted->content;
 echo "<br>";
}
}




  ?>
@endsection

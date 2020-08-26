@extends('master-admin')
@section('title', 'Add New Product')
@section('content')

  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body modal-body-sub_agile">
        <div class="main-mailposi">
          <span class="fa fa-file-text-o" aria-hidden="true"></span>
        </div>
        <div class="modal_body_left modal_body_left1">
          <h3 class="agileinfo_sign">Add New Product</h3>
          <p>
            This page allows you to add new products to the website.
          </p>
          <form method="post" enctype="multipart/form-data">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
            <div class="alert alert-success">
              {{  session('status') }}
            </div>
            @endif
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <input type="hidden" name="user_id" value="<?php $user_id = Auth::user()->id;
                echo $user_id;
              ?>">
            <label for="title">Name</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Type Product Name" id="title" name="title" required="" value="">

            </div>
            <label for="price">Price</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Type Product Price" id="price" name="price" required="" value="">
            </div>
            <label for="content">Description</label>
            <div class="styled-input agile-styled-input-top">
                <textarea name="content" class="form-control" rows="3" id="content" placeholder="Type Product Description" required=""></textarea>
            </div><br>
            <label for="categories">Product Category</label>
       <div class="styled-input">
              <select class="form-control" name="categories[]" id="category" required>
              @foreach($categories as $category)
                <option value="{!! $category->id !!}">
                  {!! $category->name !!}
                </option>
                @endforeach
              </select>
            </div>
            <br>
            <label for="content">Product Images</label>
            <p style='color:#b22222;'>Please note, Image 1 is the main image of the product, and must be uploaded, Image 2, and Image 3 are sub images;  <br>If you want the same image to be dispalyed as Image 1, Image 2 and Image 3, Upload only image 1 and then tick only one image is available before you submit. </p>
            <div class="styled-input">
              <label for="">Image 1</label>
                <input type="file" name="image1" value="" id="image1" class="btn btn-primary" required>
                <label for="">Image 2</label>
                <input type="file" name="image2" value="" id="image2" class="btn btn-primary">
                <label for="">Image 3</label>
              <input type="file" name="image3" value="" id="image3" class="btn btn-primary">

            </div><br><br>
            <div class="styled-input">
              <input type="checkbox" name="true" value=""><b>Only one Image available</b>
            </div>
            <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button>
            <input type="submit" value="Submit">
          </form>

        </div>
      </div>
    </div>
    <!-- //Modal content-->
  </div>

@endsection

@extends('master-admin')
@section('title', 'Edit Product')
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
        <h3 class="agileinfo_sign">Edit Product</h3>
        <p>
          Here you can simply edit a Product and update its information!
          <br>
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

        {!! csrf_field()  !!}

          <label for="title">Name</label>
          <div class="styled-input agile-styled-input-top">
            <input type="text" placeholder="Type Product Name" id="title" name="title" required="" value="{!!  $post->title !!}">
          </div>
          <label for="price">Price</label>
          <div class="styled-input agile-styled-input-top">
            <input type="text" placeholder="Type Product Price" id="price" name="price" required="" value="{!!  $post->price !!}">
          </div>
          <label for="select">Description</label>
          <div class="styled-input agile-styled-input-top">
              <textarea name="content" class="form-control" rows="3" id="content" placeholder="Type Product Description" required="">{!!  $post->content !!}</textarea>
          </div><br>
          <label for="categories">Change Category (Current category is displayed)</label>
       <div class="styled-input">
          <select class="form-control" name="categories[]" id="categories" required>
            @foreach($categories as $category)
              <option value="{!! $category->id !!}"
                @if(in_array($category->id, $selectedCategories))
                selected="selected"
                @endif
                >
                {!! $category->name !!}
              </option>
              @endforeach
          </select></div><br>

          <label for="image1">Image 1</label>
              <div class="">
                <img src="{!!  $post->image1 !!}" alt="{!!  $post->title !!}" width="65%"/>
              </div><br>
              <label for="">Update Image 1</label>
                <input type="file" name="image1" value="" id="image1" class="btn btn-primary">
          <br>
          <label for="image1">Image 2</label>
              <div class="">
                <img src="{!!  $post->image2 !!}" alt="{!!  $post->title !!}" width="65%"/>
              </div><br>
              <label for="">Upload/Update Image 2</label>
                <input type="file" name="image2" value="" id="image2" class="btn btn-primary">
          <br>
          <label for="image1">Image 3</label>
              <div class="">
                <img src="{!!  $post->image3 !!}" alt="{!!  $post->title !!}" width="65%"/>
              </div><br>
              <label for="">Upload/Update Image 3</label>
                <input type="file" name="image3" value="" id="image3" class="btn btn-primary">
          <br>

          <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button>
          <input type="submit" value="Submit">
        </form>

      </div>
    </div>
  </div>
  <!-- //Modal content-->
</div>

@endsection

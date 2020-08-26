@extends('master-admin')
@section('title', 'Create A New Category')
@section('content')

  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body modal-body-sub_agile">
        <div class="main-mailposi">
          <span class="fa fa-envelope-o" aria-hidden="true"></span>
        </div>
        <div class="modal_body_left modal_body_left1">
          <h3 class="agileinfo_sign">Create a new category</h3>
          <p>
            This page allows you to add new category for various items.
          </p>
          <form method="post">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
            <div class="alert alert-success">
              {{  session('status') }}
            </div>
            @endif
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label for="title">Name</label>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Type Category Name" id="name" name="name" required="" value="">
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

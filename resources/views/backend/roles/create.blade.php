@extends('master-admin')
@section('title', 'Create A New Role')
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
          <h3 class="agileinfo_sign">Create a new role</h3>
          <p>
            This page creates a new role for users, here you set the type of permission or rights you want for your users.
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
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Name" id="name" name="name" required="" value="">
            </div>
            <div class="styled-input">
              <input type="text" placeholder="Display Name" name="display_name" required="" id="display_name" value="">
            </div>
            <div class="styled-input">
              <input width="10px" height="10px" id="description" type="text" placeholder="Description" name="description" required="">
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

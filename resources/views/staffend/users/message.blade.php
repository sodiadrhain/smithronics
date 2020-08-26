@extends('master-admin')
@section('title', 'Send a Message')
@section('content')
<br>
        <h3 class="agileinfo_sign">Send {{ $user->first_name }} a Message</h3>
<div class="container">
  <div class="row banner">
    <div class="">
      <div class="list-group">

              <div class="list-group-item">
                    <div class="row-action-primary">
                      <i class="mdi-social-person"></i>

                    </div>
              <div class="row-content">
                <div class="action-secondary"> <i class="mdi-social-info"></i>
                </div>
                <form class="form-horizontal" action="" method="post">
                  @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                  @endforeach
                  @if(session('status'))
                  <div class="alert alert-success">
                  {{ session('status')}}
                  </div>
                  @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <label for="">Title of Message:</label>
                <input type="text" name="title" value="" id="title" placeholder="Message Title" required>
                 <br><br>
                   <textarea class= "form-control" name="content" rows="3" id="content" placeholder="Write message body..." required></textarea>
                   <br><button class="btn btn-primary btn-raised" type="submit">Send Message</button>
               </form>
              </div>
            </div>
            <div class="list-group-separator">
            </div>
            <hr>
            <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button><hr>
        </div>

      </div>

    </div>

    </div>


    @endsection

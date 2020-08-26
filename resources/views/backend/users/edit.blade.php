@extends('master-admin')
@section('title', 'Edit a user')
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
        <h3 class="agileinfo_sign">Edit user - {{  $user->first_name }}</h3>
        <p>
          Here you can simply edit a user details and update their information.
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
          <h4> <b style='color:#b22222;'>PROFILE PICTURE/PASSPORT</b> </h4><br>
          <img src="{{ $user->image }}" alt="" width="200" height="220">
          <div class="styled-input">
          Upload/Update user Profile picture
          <br>
          <input type="file" name="image" value="" id="image" class="btn btn-primary">
            </div><br><br>
          <h4> <b style='color:#b22222;'>PERSONAL INFORMATION</b> </h4><br>          <label for="">Surname</label>
          <div class="styled-input agile-styled-input-top">
            <input type="text" placeholder="Surname" id="sur_name" name="sur_name" required="" value="{{  $user->sur_name }}" minlength="3">
          </div>          <label for="">Firstname</label>
          <div class="styled-input">
            <input type="text" placeholder="First Name" name="first_name" required="" id="first_name" value="{{  $user->first_name }}" minlength="3">
          </div><label for="">Other Names</label>
          <div class="styled-input">
            <input type="text" placeholder="Other Names" name="other_name" required="" id="other_name" value="{{  $user->other_name }}" minlength="3">
          </div>
<label for="">Birth Day</label>
          <div class="styled-input">
          <input  placeholder="Day: Enter Birth Day" type="text" name="day" id="day" value="{{  $user->day }}" minlength="2" maxlength="2" required></div>
          <label for="">Birth Month</label>          <div class="styled-input">
            <input  placeholder="Month: Enter Birth Month in full" type="text" name="month" id="month" value="{{  $user->month }}" minlength="" maxlength="" required></div><label for="">Birth Year</label>
            <div class="styled-input"><input  placeholder="Year: Enter Birth Year" type="text" name="year" id="year" value="{{  $user->year }}" minlength="4" maxlength="4" required>
</div><label for="">State of Origin</label>
          <div class="styled-input">
            <input  placeholder="State of Origin: Enter in full" type="text" name="state_of_origin" id="state_of_origin" value="{{  $user->state_of_origin}}" minlength="" maxlength="" required>
  </div><label for="">Local Government Area (LGA)</label>
          <div class="styled-input">
            <input type="text" placeholder="Local Government Area (LGA)" name="lga" required="" id="lga" value="{{  $user->lga }}" minlength="5">
          </div><label for="">Sex</label>
          <div class="styled-input">
            <input type="text" placeholder="Sex" name="sex" required="" id="sex" value="{{  $user->sex }}">
          </div><label for="">Marital Status</label>
      <div class="styled-input">
                      <input type="text" placeholder="Marital Status" name="marital_status" required="" id="marital_status" value="{{  $user->marital_status }}">
                    </div><label for="">Religion</label>
                    <div class="styled-input">
<input type="text" placeholder="Religion" name="religion" required="" id="religion" value="{{  $user->religion}}">
      </div>                      <label for="">Nature of Business</label>     <div class="styled-input">
            <input type="text" placeholder="Nature of your Business" name="nature_of_business" id="nature_of_business" value="{{  $user->nature_of_business}}" minlength="5" required>
          </div>                        <label for="">Email Address</label>
          <div class="styled-input">
            <input type="email" placeholder="E-mail Address" name="email" required="" id="email" value="{{  $user->email}}" minlength="6">
          </div>
                    <label for="">Phone Number</label>
          <div class="styled-input">
            <input type="text" placeholder="Phone Number" name="phone" required="" id="phone"  minlength="11" maxlength="11" value="{{  $user->phone}}">
          </div>
            <label for="">Shop / Office Address</label>
          <div class="styled-input">
            <input type="text" placeholder="Shop / Office Address" name="office_address" id="office_address" value="{{  $user->office_address}}" minlength="10" required>
          </div>
           <br>
            <h4> <b style='color:#b22222;'>PAYMENT OPTION</b> </h4><div><br>
            <label for="">User default payment style: </label>      <div class="styled-input">
                <input type="text" placeholder="Payment style/option" name="payment_option" id="payment_option" value="{{  $user->payment_option}}" required>
              </div>
     <h4> <b style='color:#b22222;'>NEXT OF KIN / ALTERNATE RECEIVER</b> </h4><br>     <label for="">Next of KIN Full name</label>
     <div class="styled-input">
       <input type="text" placeholder="Next of KIN Full name (Surname First)" name="next_kin_name" id="next_kin_name" value="{{  $user->next_kin_name }}" minlength="5" required>
     </div>
          <label for="">Next of KIN Birth Day</label>
     <div class="styled-input">
     <input  placeholder="Day: Enter Birth Day for Next of Kin" type="text" name="next_kin_day" id="next_kin_day" value="{{  $user->next_kin_day }}" minlength="2" maxlength="2" required>      </div>    <label for="">Next of KIN Birth Month</label> <div class="styled-input">
       <input  placeholder="Month: Enter Birth Month for Next of Kin in full" type="text" name="next_kin_month" id="next_kin_month" value="{{  $user->next_kin_month }}" minlength="" maxlength="" required>      </div>    <label for="">Next of KIN Birth Year</label> <div class="styled-input">
<input  placeholder="Year: Enter Birth Year" type="text" name="next_kin_year" id="next_kin_year" value="{{  $user->next_kin_year }}" minlength="4" maxlength="4" required>
     </div>       <label for="">Relationship with Next of KIN</label>
     <div class="styled-input">
       <input type="text" placeholder="Relationship with Next of KIN" name="next_kin_relationship" id="next_kin_relationship" value="{{  $user->next_kin_relationship }}" minlength="5" required>
     </div>
     <label for="">Next of KIN Phone Number</label>
     <div class="styled-input">
       <input type="text" placeholder="Next of KIN Phone Number" name="next_kin_phone" required="" id="next_kin_phone" minlength="11" maxlength="11" value="{{  $user->next_kin_phone }}">
     </div>  <label for="role">Add a Role</label>
       <div class="styled-input">
         <select class="form-control" name="role[]" id="role">
         @foreach($roles as $role)
           <option value="{{  $role->id }}" @if(in_array($role->id, $selectedRoles)) selected="selected" @endif>
             {!! $role->display_name !!}
           </option>
           @endforeach
         </select>
       </div><br><h4> <b style='color:#b22222;'>UPDATE USER PASSWORD</b> </h4><br>
       <label for="password">Password</label>
       <div class="styled-input">
         <input type="password" id="password" name="password">
       </div>
       <label for="password">Confirm password</label>
       <div class="styled-input">
         <input type="password" id="password_confirmation" name="password_confirmation">
       </div>
          <div class="styled-input">
            <input type="checkbox" name="" value="" onclick="myPass()">Show Password
          </div>
          <div class="styled-input">
            <input type="checkbox" name="" value="" onclick="myPass2()">Show Confirm Password
          </div>
          <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button>
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
  <!-- //Modal content-->
  </div>
</div>
  <!-- //Modal2 -->
  <!-- //signup Model -->
  <script type="text/javascript">
  function myPass(){
  var y = document.getElementById("password");
  if(y.type === "password"){
    y.type = "text";
  } else{
    y.type = "password";
  }
  }
  function myPass2(){
  var y = document.getElementById("password_confirmation");
  if(y.type === "password"){
    y.type = "text";
  } else{
    y.type = "password";
  }
  }
  </script>
@endsection

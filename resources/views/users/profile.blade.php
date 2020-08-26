<?php
if(!Auth::check()){
header("location: /");
exit();
} else{
  if ($user = Auth::user()) {
   $user_id = Auth::user()->id;}
    ?>

@extends('master')
@section('title', 'User Profile')
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
        <h3 class="agileinfo_sign">My Profile</h3>
        <p>
          Here you can simply view your profile information, Kindly contact Admin/Staff to edit your profile.
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
          {!! csrf_field()  !!}
          <h4> <b style='color:#b22222;'>PROFILE PICTURE/PASSPORT</b> </h4><br>
          <img src="{{ Auth::user()->image }}" alt="" width="200" height="220"><br><br>
          <h4> <b style='color:#b22222;'>PERSONAL INFORMATION</b> </h4><br>
          <label for="">Surname</label>
          <div class="styled-input agile-styled-input-top">
            <input type="text" placeholder="Surname" id="sur_name" name="sur_name" required="" value="{{ Auth::user()->sur_name }}" minlength="3" readonly>
          </div>
          <label for="">Firstname</label>
          <div class="styled-input">
            <input type="text" placeholder="First Name" name="first_name" required="" id="first_name" value="{{ Auth::user()->first_name }}" minlength="3"readonly>
          </div><label for="">Other Names</label>
          <div class="styled-input">
            <input type="text" placeholder="Other Names" name="other_name" required="" id="other_name" value="{{ Auth::user()->other_name }}" minlength="3" readonly>
          </div>
        <b>Date of birthday</b>
        <br><br>
          <div class="styled-input">
      <b> Day:  </b> {{ Auth::user()->day }}<br><br>

            <b>       Month:  </b> {{ Auth::user()->month }}
<br><br><b> Year:  </b> {{ Auth::user()->year }}
<br><br>
          </div>
          <div class="styled-input">
          <b> State of Origin: </b>   {{ Auth::user()->state_of_origin }}<br><br>
</div><label for="">Local Government Area (LGA)</label>
<div class="styled-input agile-styled-input-top"> <div style="	font-size: 14px;
  letter-spacing: 1px;
  color: #777;
  border-bottom: 1px solid #dcdcdc;
  padding: 10px 0;
  letter-spacing: 1px;">{{ Auth::user()->lga }}</div><br>
</div>
              <b>  Sex:   </b> {{ Auth::user()->sex }}  <br><br><b>Marital Status:  </b>  {{ Auth::user()->marital_status }}<br><br>
            <b> Religion:   </b> {{ Auth::user()->religion }}<br><br>
                <label for="">Nature of Business</label>
                <div class="styled-input agile-styled-input-top"> <div style="	font-size: 14px;
                  letter-spacing: 1px;
                  color: #777;
                  border-bottom: 1px solid #dcdcdc;
                  padding: 10px 0;
                  letter-spacing: 1px;">{{Auth::user()->nature_of_business}}</div><br>
                </div>
          <label for="">Residential Address</label>
          <div class="styled-input agile-styled-input-top"> <div style="	font-size: 14px;
            letter-spacing: 1px;
            color: #777;
            border-bottom: 1px solid #dcdcdc;
            padding: 10px 0;
            letter-spacing: 1px;">{{Auth::user()->residential_address}}</div><br>
          </div>
          <label for="">Email Address</label>
          <div class="styled-input">
            <input type="email" placeholder="E-mail Address" name="email" required="" id="email" value="{{ Auth::user()->email }}" minlength="6" readonly>
          </div>
          <label for="">Phone Number</label>
          <div class="styled-input">
            <input type="text" placeholder="Phone Number" name="phone" required="" id="phone"  minlength="11" maxlength="11" value="{{ Auth::user()->phone }}" readonly>
          </div>
          <label for="">Shop / Office Address</label>
          <div class="styled-input agile-styled-input-top"> <div style="	font-size: 14px;
            letter-spacing: 1px;
            color: #777;
            border-bottom: 1px solid #dcdcdc;
            padding: 10px 0;
            letter-spacing: 1px;">{{Auth::user()->office_address}}</div><br>
          </div>
          <br>
            <h4> <b style='color:#b22222;'>PAYMENT OPTION</b> </h4><div><br>
          <b> Default payment style:</b>    {{ Auth::user()->payment_option }}</div>
     <br><br>
     <h4> <b style='color:#b22222;'>NEXT OF KIN / ALTERNATE RECEIVER</b> </h4><br>
     <label for="">Next of KIN Full name</label>
     <div class="styled-input">
       <input type="text" placeholder="Next of KIN Full name (Surname First)" name="next_kin_name" id="next_kin_name" value="{{ Auth::user()->next_kin_name }}" minlength="5" required readonly>
     </div>
  <b>   Date of birthday (Next of KIN)</b>
     <br><br>
     <div class="styled-input">
 <b> Day:  </b> {{ Auth::user()->next_kin_day }}<br><br>

       <b>       Month:  </b> {{ Auth::user()->next_kin_month }}
<br><br><b> Year:  </b> {{ Auth::user()->next_kin_year }}
<br><br>
     </div>
       <label for="">Relationship with Next of KIN</label>
     <div class="styled-input">
       <input type="text" placeholder="Relationship with Next of KIN" name="next_kin_relationship" id="next_kin_relationship" value="{{ Auth::user()->next_kin_relationship }}" minlength="5" required readonly>
     </div>
     <label for="">Next of KIN Phone Number</label>
     <div class="styled-input">
       <input type="text" placeholder="Next of KIN Phone Number" name="next_kin_phone" required="" id="next_kin_phone" minlength="11" maxlength="11" value="{{ Auth::user()->next_kin_phone }}" readonly>
     </div>
          <button class="btn btn-primary" type="button" onclick="goBack()">Go back</button>
        </form>

      </div>
    </div>
  </div>
  <!-- //Modal content-->
</div>

@endsection
<?php }
    ?>

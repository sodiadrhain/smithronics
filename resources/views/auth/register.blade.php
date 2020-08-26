@extends('master')
@section('title', 'Register')
@section('meta-keywords', 'Smith Ronics, Electronics & Home Appliances, Electronics, Home Appliances, Nokia, Samsung, LG, SonyEricsson, Motorola')
@section('meta-description', 'We sell Electronics & Home Appliances just for 4 months')
@section('content')
<?php
if(Auth::check()){
header("location: /");
exit();
} else{
if(isset($_GET['_token'])){
  echo "<b>set</b>";
} else{

?>
<!-- signup Model -->
<!-- Modal2 -->

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
          <h3 class="agileinfo_sign">Register</h3>
          <p>
            Let's set up your Account. <br>Already a member?
            <a href="/users/login">
              Login</a>
          </p>
          <form method="post" enctype="multipart/form-data">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error}}</p>
            @endforeach
            {!! csrf_field() !!}
            <h4> <b style='color:#b22222;'>PERSONAL INFORMATION</b> </h4><br>
            <div class="styled-input agile-styled-input-top">
              <input type="text" placeholder="Surname" id="sur_name" name="sur_name" required="" value="{{ old('sur_name') }}" minlength="3">
            </div>
            <div class="styled-input">
              <input type="text" placeholder="First Name" name="first_name" required="" id="first_name" value="{{ old('first_name') }}" minlength="3">
            </div>
            <div class="styled-input">
              <input type="text" placeholder="Other Names" name="other_name" required="" id="other_name" value="{{ old('other_name') }}" minlength="3">
            </div>
          Date of birthday
          <br><br>
            <div class="styled-input">
            Day:   <select class="" name="day" id="day" width="10" height="10" required>
              <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
                <option value="29">29</option><option value="30">30</option><option value="31">31</option>
              </select><br><br>

                     Month:   <select class="" name="month" id="month" width="" height="20" required>
                  <option value="January">January
             </option>
                  <option value="February">
February
                  </option>
                  <option value="March">March
             </option>
                  <option value="April">April
                  </option>
                  <option value="May">May
             </option>
                  <option value="June">
June
                  </option>
                  <option value="July">July
             </option>
                  <option value="August">
August
                  </option>
                  <option value="September">September
             </option>
                  <option value="October">
October
                  </option>
                  <option value="November">November
             </option>
                  <option value="December">
December
                  </option>
                </select>
<br><br>
<input  placeholder="Year: Enter Birth Year" type="text" name="year" id="year" value="{{ old('year') }}" minlength="4" maxlength="4" required>
            </div>
            <div class="styled-input">
              State of Origin:   <select class="" name="state_of_origin" id="state_of_origin" width="" height="20" required>
           <option value="Abia">Abia</option>
           <option value="Adamawa">Adamawa</option>
           <option value="Akwa Ibom">Akwa Ibom</option><option value="Anambra">Anambra</option><option value="Bauchi">Bauchi</option><option value="Bayelsa">Bayelsa</option><option value="Benue">Benue</option><option value="Borno">Borno</option><option value="Cross River">Cross River</option><option value="Delta">Delta
           </option>
           <option value="Ebonyi">Ebonyi</option>
           <option value="Edo">Edo</option><option value="Ekiti">Ekiti</option><option value="Enugu">Enugu</option><option value="Gombe">Gombe</option><option value="Imo">Imo</option><option value="Jigawa">Jigawa</option><option value="Kaduna">Kaduna</option><option value="Kano">Kano
           </option>
           <option value="Katsina">Katsina</option>
           <option value="Kebbi">Kebbi</option><option value="Kogi">Kogi</option><option value="Kwara">Kwara</option><option value="Lagos">Lagos</option><option value="Nasarawa">Nasarawa</option><option value="Niger">Niger</option><option value="Ogun">Ogun</option><option value="Ondo">Ondo
           </option>
           <option value="Osun">Osun</option>
           <option value="Oyo">Oyo</option><option value="Plateau">Plateau</option><option value="Rivers">Rivers</option><option value="Sokoto">Sokoto</option><option value="Taraba">Taraba</option><option value="Yobe">Yobe</option><option value="Zamfara">Zamfara</option><option value="Abuja">Abuja</option>
    </select><br><br>
  </div>
            <div class="styled-input">
              <input type="text" placeholder="Local Government Area (LGA)" name="lga" required="" id="lga" value="{{ old('lga') }}" minlength="5">
            </div>
                   Sex:   <select class="" name="sex" id="sex" width="" height="20" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>  <br><br> Marital Status:   <select class="" name="marital_status" id="marital_status" width="" height="20" required>   <option value="Single">Single</option>
                <option value="Married">Married</option>
              <option value="Not applicable">Not applicable</option></select><br><br>
                Religion:   <select class="" name="religion" id="religion" width="" height="20" required>
           <option value="Christain">Christian</option>
           <option value="Muslim">Muslim</option>
           <option value="Not applicable">Not applicable</option>
         </select><br><br>
            <div class="styled-input">
              <input type="text" placeholder="Nature of your Business" name="nature_of_business" id="nature_of_business" value="{{ old('nature_of_business') }}" minlength="5" required>
            </div>
            <div class="styled-input">
              <input type="text" placeholder="Residential Address" name="residential_address" id="residential_address" value="{{ old('residential_address') }}" minlength="10" required>
            </div>
            <div class="styled-input">
              <input type="email" placeholder="E-mail Address" name="email" required="" id="email" value="{{ old('email') }}" minlength="6">
            </div>
            <div class="styled-input">
              <input type="text" placeholder="Phone Number" name="phone" required="" id="phone"  minlength="11" maxlength="11" value="{{ old('phone') }}">
            </div>
            <div class="styled-input">
              <input type="text" placeholder="Shop / Office Address" name="office_address" id="office_address" value="{{ old('office_address') }}" minlength="10" required>
            </div>
            <div class="styled-input">
            Upload your Picture / Passport <i style='color:#b22222;'>(Clear pictures are required)</i>
            <br>
            <input type="file" name="image" value="" id="image" class="btn btn-primary" required>
              </div><br>
              <h4> <b style='color:#b22222;'>PAYMENT OPTION</b> </h4><div><br>
              Choose a default payment style:   <select class="" name="payment_option" id="payment_option" width="" height="20" required>
         <option value="Daily">Daily</option>
         <option value="Weekly">Weekly</option>
         <option value="Monthly">Monthly</option>
       </select></div>
       <br>
       <h4> <b style='color:#b22222;'>NEXT OF KIN / ALTERNATE RECEIVER</b> </h4><br>
       <div class="styled-input">
         <input type="text" placeholder="Next of KIN Full name (Surname First)" name="next_kin_name" id="next_kin_name" value="{{ old('next_kin_name') }}" minlength="5" required>
       </div>
       Date of birthday (Next of KIN)
       <br><br>
         <div class="styled-input">
         Day:   <select class="" name="next_kin_day" id="next_kin_day" width="10" height="10" required>
           <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option>
             <option value="10">10</option>
             <option value="11">11</option>
             <option value="12">12</option>
             <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
             <option value="20">20</option>
             <option value="21">21</option>
             <option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
             <option value="29">29</option><option value="30">30</option><option value="31">31</option>
           </select><br><br>

                  Month:   <select class="" name="next_kin_month" id="next_kin_month" width="" height="20" required>
               <option value="January">January
          </option>
               <option value="February">
February
               </option>
               <option value="March">March
          </option>
               <option value="April">April
               </option>
               <option value="May">May
          </option>
               <option value="June">
June
               </option>
               <option value="July">July
          </option>
               <option value="August">
August
               </option>
               <option value="September">September
          </option>
               <option value="October">
October
               </option>
               <option value="November">November
          </option>
               <option value="December">
December
               </option>
             </select>
<br><br>
<input  placeholder="Year: Enter Birth Year (Next of KIN)" type="text" name="next_kin_year" id="next_kin_year" value="{{ old('next_kin_year') }}" minlength="4" maxlength="4" required>
         </div>
       <div class="styled-input">
         <input type="text" placeholder="Relationship with Next of KIN" name="next_kin_relationship" id="next_kin_relationship" value="{{ old('next_kin_relationship') }}" minlength="5" required>
       </div>
       <div class="styled-input">
         <input type="text" placeholder="Next of KIN Phone Number" name="next_kin_phone" required="" id="next_kin_phone" minlength="11" maxlength="11" value="{{ old('next_kin_phone') }}">
       </div><br><h4> <b style='color:#b22222;'>ACCOUNT PASSWORD</b> </h4><br>
            <div class="styled-input">
              <input type="password" placeholder="Enter a Password for Account" name="password" required="" minlength="10" id="password">
            </div>
            <div class="styled-input">
              <input type="password" placeholder="Confirm Password" name="password_confirmation" required="" id="password_confirmation">
            </div>
            <div class="styled-input">
              <input type="checkbox" name="" value="" onclick="myPass()">Show Password
            </div>
            <div class="styled-input">
              <input type="checkbox" name="" value="" onclick="myPass2()">Show Confirm Password
            </div><br>
            <i style='color:#b22222;'>Kindly go through all the details entered once more before you submit</i>
            <input type="submit" value="Register">
          </form>
          <br><h4> <b style='color:#b22222;'><i>PLEASE NOTE</i></b> </h4><br><p>All information entered above should match real data of user<br>Account is subject to review by our staff <br>Accounts found to contain invalid information will be disabled<br>
            By clicking register, You agree to our <a href="/terms" target="_blank">terms</a>
          </p>
        </div>
      </div>
    </div>
    <!-- //Modal content-->
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
<?php
}
}
?>
@endsection

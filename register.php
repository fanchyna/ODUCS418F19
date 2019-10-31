<?php
session_start();
require_once("./connect_db.php");
require_once("./navbar.php");
if(isset($_SESSION['id']))
{
  echo "<script>$('#display').html('Welcome ".$_SESSION['family_name']."');</script>";
  echo "<script>$('#logout').attr('hidden',false);</script>";
  echo "<script>$('#contribute').attr('hidden',false);</script>";
}
else
{
  echo "<script>$('#logout').attr('hidden',true);</script>";
}
if(isset($_COOKIE['id']))
{
	echo "<script>$('#display').html('Welcome ".$_COOKIE['family_name']."');</script>";
	echo "<script>$('#logout').attr('hidden',false);</script>";
	$_SESSION['id']= $_COOKIE['id']; 
	$_SESSION['family_name']= $_COOKIE['family_name']; 
	$_SESSION['email']= $_COOKIE['email']; 
	// setcookie("id", "", time()-3600);
	setcookie("family_name", "", time()-3600);
	setcookie("email", "", time()-3600);
	setcookie("id", "", time()-3600);
}
?>
<html>
    <head>
        <title>Registration Page</title>
</head>
<link rel="stylesheet" href="./css/register.css">
<script>
    function onSuccess(googleUser) {
      var profile = googleUser.getBasicProfile();
      document.cookie = "id=" + String(profile.getId());
      document.cookie = "family_name=" + String(profile.getFamilyName()); 
      document.cookie = "email=" + String(profile.getEmail());
      window.location.href="index.php";
      // The ID token you need to pass to your backend:
      var id_token = googleUser.getAuthResponse().id_token;
      console.log("ID Token: " + id_token);
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <script>
  function checkRecaptcha() {
  var response = grecaptcha.getResponse();
  if(response.length == 0) { 
    //reCaptcha not verified
    alert("Captcha not Verified!"); 
  }
  else { 
    //reCaptch verified
    var full_name = $("#inp_full_name").val();
      var inp_email = $("#inp_email").val();
      var inp_phone_1 = $("#inp_phone_1").val();
      var inp_phone_2 = $("#inp_phone_2").val();
      var password = $("#inp_password").val();
      var password_repeat = $("#inp_password_repeat").val();
      var verify_status = 0;
      var flag = 1;
      if(full_name == "" || inp_email == "" || inp_phone_1 == "" || inp_phone_2 == "" || password == "" || password_repeat == "")
      {
          alert("Please enter all fields and retry!");
          flag = 0;
      }
      else if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inp_email) == false) 
      {
      alert("Email not valid");  
      flag = 0;
      }
      else if(inp_phone_2.length < 7)
      {
        alert("Enter a valid phone number");
        flag = 0;
      }
     else if(password.length >= 8 || password_repeat.length >= 8){
      if(password == password_repeat)
      {
        flag = 1;
      }
      else
      {
        alert("Passwords dont match");
        flag = 0;
      }
    }
    else
    {
        alert("Length of password should be 8 characters");
        flag = 0;
    } 
    if(flag == 1)  //after all validation
    {
      $.ajax({
        async: false,
        url: "./check_avail.php",
        type: "post",
        data:{
         "email":inp_email
        }
        }).then(function(response){
          if(response=="0"){
            alert("Account already exists!");
            window.location.href="index.php";
          } 
          else if(response=="1"){
            $.ajax({
              async: false,
              url: "./record_insert.php",
              type :"post",
              data:{
                "full_name":full_name,
                "email":inp_email,
                "phone_number":inp_phone_1+inp_phone_2,
                "password":password,
                "verify_status":verify_status,
              },
              success :function(res){
                if(res=="1")
                {
                  alert("Your account has been created. A Verification link has been sent your mail-ID");
                  window.location.href="index.php";
                }
                else if(res=="0")
                {
                  alert("Account creation failed");
                  window.location.href="index.php";
                }
              }
            });
            }     
        })
    }
  }
}
// implement on the backend
function backend_API_challenge() {
    var response = grecaptcha.getResponse();
    $.ajax({
        type: "POST",
        url: 'https://www.google.com/recaptcha/api/siteverify',
        data: {"secret" : "6Le0A7oUAAAAAE2UIwcgbefk6TGZaPQt-QvFE-bR", "response" : response, "remoteip":"localhost"},
        contentType: 'application/x-www-form-urlencoded',
        success: function(data) { console.log(data); }
    });
}
    // var revokeAllScopes = function () {
    //   auth2.disconnect();
    // }
  </script>
<body style="background:#437993;">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<meta name="google-signin-client_id"
    content="385121102241-7ets9shv8jsjcs6abumfimihacc2bush.apps.googleusercontent.com">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

<script>
$(document).ready(function(){
  $("#logout").click(function(){
			 $.ajax({
				 url:"./logout.php",
				 success: function(){
					window.location.href="index.php";
				 }
			 })
    })
})
</script>
<div class="container p-5" style="margin-top:2%;">

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-1 text-center">Create Account</h4>

    <div id="my-signin2"  style="margin-left:15%;"></div>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="" id="inp_full_name" class="form-control" placeholder="Full name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="" id="inp_email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 120px;">
		    <option selected="" id="inp_phone_1">+1757</option>
		</select>
    	<input name="" id="inp_phone_2" class="form-control" placeholder="Phone number" type="number">
    </div> <!-- form-group// -->
   
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" id="inp_password" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" id="inp_password_repeat" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->    
    <div class="g-recaptcha" data-sitekey="6Le0A7oUAAAAAE2UIwcgbefk6TGZaPQt-QvFE-bR"  style="margin-left:5%; margin-bottom:3%;"></div>                                  
    <div class="form-group">
        <button type="submit" id="submit" class="btn btn-primary btn-block" onclick="checkRecaptcha();"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="./login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!--container end.//-->
</body>
</html>
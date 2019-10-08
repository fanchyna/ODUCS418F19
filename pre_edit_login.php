<?php
session_start();
require_once("./navbar.php");
if(isset($_SESSION['id']))
{
  echo "<script>$('#display').html('Welcome ".$_SESSION['family_name']."');</script>";
  echo "<script>$('#logout').attr('hidden',false);</script>";
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
        <title>Security Login</title>
</head>
<link rel="stylesheet" href="./css/register.css">
  <script>
  function checkRecaptcha() {
  var response = grecaptcha.getResponse();
  if(response.length == 0) { 
    alert("Captcha not verified!"); 
  }
  else { 
    var email = $("#inp_email").val();
    var pass = $("#inp_pass").val();
    var flag = 1;
    if(email == "" ||  pass == "")
      {
          alert("Please enter all field and retry!");
          flag = 0;
      }
      else if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) == false) 
      {
      alert("Email not valid");  
      flag = 0;
      }
      else if(pass.length >= 8){
        flag = 1;
    }
    else
    {
        alert("Length of password should be 8 characters");
        flag = 0;
    }
    if(flag == 1)
    {
      $.ajax({
          async: false,
          url:"./check_account.php",
          type : "post",
          data:{
            "email":email,
            "password":pass
          },
          success: function(res){
            if(res=="1")
            {
              alert("You have successfully logged in...");
              window.location.href="user_control.php";
            }
            else
            {
              alert(res);
            }
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
	<h4 class="card-title mt-1 text-center" style="margin-bottom:5%;">For Security purposes we need your login</h4>

	<p class="divider-text">
        <span class="bg-light"></span>
    </p>
	<div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Email address" type="email" id="inp_email">
    </div> <!-- form-group// -->
   
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="password" type="password" id="inp_pass">
    </div> <!-- form-group// -->
    
    <div class="g-recaptcha" data-sitekey="6Le0A7oUAAAAAE2UIwcgbefk6TGZaPQt-QvFE-bR"  style="margin-bottom:3%; margin-left:10%;" ></div>                                  
    <div class="form-group" style="margin-left:-4%;">
        <button type="submit" class="btn btn-primary btn-block" onclick="checkRecaptcha();"> Login </button>
    </div> <!-- form-group// -->   
    <p class="text-center">Forgot Password? <a href="./pass_forget.php">Click here to reset</a> </p>                                                                     
</div>
</article>
</div> <!-- card.// -->

</div> 
<!-- Copyright -->
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!-- Copyright -->
<!--container end.//-->
</body>
</html>
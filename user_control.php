<?php
session_start();
require_once("./navbar.php");

if(isset($_SESSION['id']))
{
  echo "<script>$('#display').html('Welcome ".$_SESSION['family_name']."');</script>";
  echo "<script>$('#logout').attr('hidden',false);</script>";
  $name_session = $_SESSION['family_name'];
  $email_session = $_SESSION['email'];
  if(substr($_SESSION['phnum'],2)=="+1")
  {
    $phnum_session = substr($_SESSION['phnum'],2);
  }
  else
  {
    $phnum_session = $_SESSION['phnum'];
  }
 
  
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
        <title>User control Section</title>
</head>
<link rel="stylesheet" href="./css/register.css">
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script>
$(document).ready(function(){
   
    $("#update_profile").click(function(){
        $("#update_button").attr("hidden",false);
        $("#captcha").attr("hidden",false);
        $("#pass_button").attr("hidden",true);
        $("#pass").attr("hidden",true);
        $("#repass").attr("hidden",true);
        $("#inp_full_name").removeAttr("disabled");
        $("#inp_phnum").removeAttr("disabled");
        $("#inp_full_name").attr("hidden",false);
        $("#inp_email").attr("hidden",false);
        $("#inp_phnum").attr("hidden",false);
        $("#user_logo").attr("hidden",false);
        $("#phone_logo").attr("hidden",false);
    })
    $("#change_password").click(function(){
        $("#pass_button").attr("hidden",false);
        $("#captcha").attr("hidden",false);
        $("#pass").attr("hidden",false);
        $("#repass").attr("hidden",false);
        $("#update_button").attr("hidden",true);
        $("#inp_full_name").attr("hidden",true);
        $("#inp_phnum").attr("hidden",true);
        $("#user_logo").attr("hidden",true);
        $("#phone_logo").attr("hidden",true);
    })
    $("#logout").click(function(){
			 $.ajax({
				 url:"./logout.php",
				 success: function(){
					window.location.href="index.php";
				 }
			 })
		})


    // var revokeAllScopes = function () {
    //   auth2.disconnect();
    // }
	})
</script>
<script>
 function call_update()
{
    checkRecaptcha(1);
}

function call_pass()
{
    checkRecaptcha(0)
}
    function change_password(){
        var password_new = $("#inp_new_password").val();
        var password_old = $("#inp_old_password").val();
        var change_password = 1;
        var flag = 1;
    if(password_new == "" || password_old == "")
      {
          alert("Please enter both old and new password fields!");
          flag = 0;
      }
    else if(password_new.length >= 8 || password_old.length >= 8){
     flag = 1;
    }
    else
    {
        alert("Length of passwords should be 8 characters");
        flag = 0;
    }
    if(flag == 1)
    {
        $.ajax({
            async:false,
            url:"./update_record.php",
            type:"post",
            data:{
                "pass_old":password_old,
                "pass_new":password_new,
                "flag":change_password
            },
            success:function(res){
                if(res=="1")
                {
                    alert("Updated password successfully");
                    window.location.href="index.php";
                }
                else
                {
                    alert(res);
                }
            }
        });
    } 
    }

    function update_profile(){
        var name = $("#inp_full_name").val();
        var phnum = $("#inp_phnum").val();
        var change_password = 0;
        var flag = 1;
        if(name == "" || phnum == "")
        {
          alert("Please enter all fields and retry!");
          flag = 0;
        }
        else if(phnum.length < 10)
        {
        alert("Enter a valid phone number");
        flag = 0;
        }
        if(flag == 1)
        {
            $.ajax({
            async:false,
            url:"./update_record.php",
            type:"post",
            data:{
                "name":name,
                "phone_number":phnum,
                "flag":change_password
            },
            success:function(res){
                if(res=="1")
                {
                    alert("Updated details successfully");
                    window.location.href="index.php";
                }
                else
                {
                    alert(res);
                }
            }
        });
        }

    }


    function checkRecaptcha(wfunc) {
  var response = grecaptcha.getResponse();
  if(response.length == 0) { 
    //reCaptcha not verified
    alert("Captcha not verified!"); 
  }
  else { 
    //reCaptch verified
    if(wfunc==1)
    {
        // alert("Calling profile");
        update_profile();
    }
    else if(wfunc==0)
    {
        // alert("Calling password");
        change_password();
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
</script>
<body style="background:#437993;">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<meta name="google-signin-client_id"
    content="385121102241-7ets9shv8jsjcs6abumfimihacc2bush.apps.googleusercontent.com">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


<div class="container p-5" style="margin-top:2%;">

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-1 text-center">Profile Details</h4>


	<p class="divider-text">
        <span class="bg-light"></span>
    </p>
	<div>
	<div class="form-group input-group">
		<div class="input-group-prepend" id="user_logo">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Full name" type="text" id="inp_full_name" value ="<?php echo $name_session; ?>" disabled>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend" id="email_logo">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Email address" type="email" id="inp_email" value ="<?php echo $email_session; ?>" disabled>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend" id="phone_logo">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		
    	<input name="" class="form-control" placeholder="Phone number" type="text" id="inp_phnum" value ="<?php echo $phnum_session; ?>" disabled>
    </div> <!-- form-group// -->
   
    <div class="form-group input-group" hidden id="pass">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Old password" type="password" id="inp_old_password">
    </div> <!-- form-group// -->
    <div class="form-group input-group" hidden id="repass">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="New password" type="password" id="inp_new_password">
    </div> <!-- form-group// -->    
    <div class="g-recaptcha" data-sitekey="6Le0A7oUAAAAAE2UIwcgbefk6TGZaPQt-QvFE-bR" id="captcha" style="margin-left:1%; margin-bottom:3%;" hidden></div>                                  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" onclick="call_update();" id="update_button" hidden>Update Profile Details</button>
        <button type="submit" class="btn btn-primary btn-block" onclick="call_pass();" id="pass_button" hidden>Change Password</button>
    </div> <!-- form-group// -->      
    <p class="text-center">Want to change password?<a id="change_password" style="color:blue;">&nbsp;Click here</a></p>
    <p class="text-center">Want to update profile?<a id="update_profile" style="color:blue;">&nbsp;Click here</a> </p>                                                                 
</div>
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
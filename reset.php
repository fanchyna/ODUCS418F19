<?php
require_once("./navbar.php");
session_start();
?>
<html>
    <head>
        <title>Password Reset</title>
</head>
<link rel="stylesheet" href="./css/register.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<meta name="google-signin-client_id"
    content="385121102241-7ets9shv8jsjcs6abumfimihacc2bush.apps.googleusercontent.com">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
<body style="background:#437993;">
<script>
$(document).ready(function(){
	$("#submit").click(function() {
  var response = grecaptcha.getResponse();
  if(response.length == 0) { 
    //reCaptcha not verified
    alert("Captcha not Verified!"); 
	location.reload();
  }
  else { 
    //reCaptch verified
      var password = $("#inp_password").val();
      var password_repeat = $("#inp_password_repeat").val();
	  var email= '<?php echo $_SESSION['email'];?>';
      var flag = 1;
      if(password == "" || password_repeat == "")
      {
          alert("Please enter all field and retry!");
          flag = 0;
		  location.reload();
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
		location.reload();
      }
    }
    else
    {
        alert("Length of password should be 8 characters");
        flag = 0;
		location.reload();
    } 
    if(flag == 1)  //after all validation
    {
		$.ajax({
			async:false,
			url: "./update_password.php",
			type: "post",
			data:{
				"password":password,
				"email": email
			},
			success:function(res)
			{
				if(res=="1")
				{
					alert("Password updated");
					window.location.href="index.php";
				}
				else
				{
					alert(res);
				}
			}
		})
	}
	
		$("#logout").click(function(){
			 $.ajax({
				 url:"./logout.php",
				 success: function(){
					window.location.href="index.php";
				 }
			 })
		})

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
  }
	}) 	
})
</script>
<?php
if(isset($_GET['id']))
{
	$email = $_GET['email'];
	$hemail = $_GET['id'];
	$dbhash = $_GET['value'];
	$_SESSION["email"]=$email;
	if(password_verify($email,$hemail)==TRUE && password_verify($hemail,$dbhash)==TRUE)
	{
		echo "<div class='container p-5' style='margin-top:2%;'>

		<div class='card bg-light'>
		<article class='card-body mx-auto' style='max-width: 400px;'>
			<h4 class='card-title mt-1 text-center' style='margin-bottom:5%;'>RESET YOUR PASSWORD</h4>

			<p class='divider-text'>
				<span class='bg-light'></span>
			</p>
			<div>
		
			<div class='form-group input-group'>
			<div class='input-group-prepend'>
				<span class='input-group-text'> <i class='fa fa-lock'></i> </span>
			</div>
			<input class='form-control' id='inp_password' placeholder='Create password' type='password'>
		</div> <!-- form-group// -->
		<div class='form-group input-group'>
			<div class='input-group-prepend'>
				<span class='input-group-text'> <i class='fa fa-lock'></i> </span>
			</div>
			<input class='form-control' id='inp_password_repeat' placeholder='Repeat password' type='password'>
		</div> <!-- form-group// -->    
			<div class='g-recaptcha' data-sitekey='6Le0A7oUAAAAAE2UIwcgbefk6TGZaPQt-QvFE-bR'  style='margin-bottom:3%; margin-left:1%;'></div>                                  
			<div class='form-group' style='margin-left:-4%;'>
				<button type='submit' class='btn btn-primary btn-block' id='submit'> Reset Password </button>
			</div> <!-- form-group// -->                                                                   
		</div>
		</article>
		</div> <!-- card.// -->
		</div> ";
	}
	else
	{
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>";
		echo "</script>";
		echo "<script>swal('Unauthorized Access', 'Your account password cannot be changed.', 'error').then(function(){
			window.location.href='index.php';
		});</script>";
	}
}
?>
<!-- Copyright -->
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!-- Copyright -->
<!--container end.//-->
</body>

</html>
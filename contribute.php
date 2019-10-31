<?php
session_start();
require_once("./connect_db.php");
require_once("./navbar.php");
if(!(isset($_SESSION['our_system'])))
{
    echo "
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script>swal('Welcome to BestSearch', 'Please login for contribution to website', 'error').then(function(){
        window.location.href='index.php';
    });</script>";
}
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
        <title>Index values to our system</title>
</head>
<link rel="stylesheet" href="./css/register.css">
<script>
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
<body style="">

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
	

	$("select.bluetooth").change(function(){
		var selected = $(this).children("option:selected").val();
        $("#bluetooth").val(selected);
    });

    $("select.processor").change(function(){
        var selected = $(this).children("option:selected").val();
		$("#processor").val(selected);
    });

    $("select.sim").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#sim").val(selected);
    });

    $("select.gps").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#gps").val(selected);
    });

    $("select.cores").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#cores").val(selected);
    });

    $("select.status").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#status").val(selected);
    });

    $("select.disp_tech").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#disp_tech").val(selected);
    });
})
</script>
<div class="container p-5" style="margin-top:2%;">

<form action="./post_index.php" method='POST'>

	<div class="form-group"> 
		<label class="control-label">Brand</label>
		<input type="text" class="form-control" id="brand" name="brand" placeholder="iphone">
	</div>	

	<div class="form-group">
		<label class="control-label">Model</label>
		<input type="text" class="form-control" id="model" name="model" placeholder="11 pro Max">
	</div>					
							
	<div class="form-group">
		<label class="control-label">Announced</label>
		<br>
		<input type="date" id="announced" name="announced"
       value="2018-07-22"
       min="2000-01-01" max="2020-01-01">
	</div>	

	<div class="form-group">
		<label class="control-label">Available colours</label>
		<input type="text" class="form-control" id="colour" name="colour" placeholder="Orange, Purple, Not so White">
	</div>

	<div class="form-group">
		<label class="control-label">Phone Image Url</label><br>
		<input type="url" name="url" id="url"
       placeholder="http://cdn2.gsmarena.com/vv/bigpic/acer-liquid-z6-plus.jpg"
       pattern="http.://.*" size="100">
	</div>									

	<div class="form-group">
		<label class="control-label">Battery capacity</label>
		<input type="number" class="form-control" id="battery" name="battery" min="10" max="10000" placeholder="3500 mAh (Just specify the capacity in numbers)">
	</div>
	

	<div class="form-group">
		<label class="control-label">Price in EUR</label>
		<input type="number" class="form-control" id="price" name="price" min="10" max="10000" placeholder="300 EUR (Just specify the price in numbers)">
	</div>

	
	<div class="form-group">
		<label class="control-label">Display Size</label>
		<input type="number" class="form-control" id="size" name="size" min="1.0" max="20.50" placeholder="5.5 inches (Just specify the size in numbers)">
	</div>

	<div class="form-group">
		<label class="control-label">Camera Resolution</label>
		<input type="number" class="form-control" id="cam_res" name="cam_res" min="1" max="200" placeholder="56 MP (Just specify the camera resolution in numbers)">
	</div>

	<div class="form-group">
		<label class="control-label">Internal Memory</label>
		<input type="number" class="form-control" id="mem" name="mem" min="14" max="1000" placeholder="32 GB(Just specify the memory in numbers)">
	</div>

	<div class="form-group">
		<label class="control-label">RAM</label>
		<input type="number" class="form-control" id="ram" name="ram" min="1" max="500" placeholder="32 GB(Just specify the RAM capacity in numbers)">
	</div>


	<div class="form-group">
		<label class="control-label">Bluetooth</label>
		<select class="form-control bluetooth">
			<option selected>v 5.0</option>
			<option>v 4.0</option>
			<option>No</option>
		</select>					
	</div>

	<div class="form-group">
		<label class="control-label">Processor</label>
		<select class="form-control processor">
			<option selected>Qualcomm</option>
			<option>Mediatek</option>
			<option>Apple bionic Chipset</option>
			<option>Samsung Exynos</option>
		</select>					
	</div>
		
	<div class="form-group">
		<label class="control-label">Number of SIM cards</label>
		<select class="form-control sim">
			<option selected>One</option>
			<option>Two</option>
			<option>Four</option>
		</select>					
	</div>

	<div class="form-group">
		<label class="control-label">GPS support</label>
		<select class="form-control gps">
			<option selected>Yes</option>
			<option>No</option>
		</select>					
	</div>

	<div class="form-group">
		<label class="control-label">Number of Processor Cores</label>
		<select class="form-control cores">
			<option>Single Core</option>
			<option selected>Dual Core</option>
			<option>Quad Core</option>
			<option>Octa Core</option>
		</select>					
	</div>
	
	
	<div class="form-group">
		<label class="control-label">Current Availability</label>
		<select class="form-control status">
			<option selected>Available for sale</option>
			<option>Discontinued</option>
		</select>					
	</div>

	<div class="form-group">
		<label class="control-label">Display Technology</label>
		<select class="form-control disp_tech">
			<option selected>TFT</option>
			<option>LCD</option>
			<option>AMOLED</option>
			<option>OLED</option>
			<option>LED-LCD</option>
		</select>					
	</div>

    <input type="text" class="form-control input-lg col-lg-4 input-search" value="v 5.0"  id="bluetooh" name="bluetooth" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Qualcomm"  id="processor" name="processor" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="One"  id="sim" name="sim" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Yes"  id="gps" name="gps" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Dual Core"  id="cores" name="cores" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Available for sale"  id="status" name="status" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="TFT"  id="disp_tech" name="disp_tech" hidden>

	<div class="form-group"> 
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>     
	
</form>			

</div> 
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!--container end.//-->
</body>
</html>
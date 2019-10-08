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
        <title>Advanced Search</title>
</head>
<link rel="stylesheet" href="./css/register.css">

<body style="background:#437993;">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function(){
		$("#submit").click(function(){
			swal("You are awesome", "Just a few more days to use this functionality!", "success").then(function(){
				window.location.reload();
			});
    })
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

<div class="container" style="margin-top:4%; margin-bottom:2%;">

<div class="card bg-light p-1">
<article class="p-4">
	<h1 class="card-title mt-1 text-center" style="margin-bottom:5%; margin-top:10%; color:#33b5e5;">Advanced search options</h1>
    <h4 class="card-title text-center" style="margin-top:-2%; ">(Phone with specifications) </h4> 

	<p class="divider-text">
        <span class="bg-light"></span>
    </p>
	<div>
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Screen Resolution&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">4K</option>
            <option selected="" style="max-width: 250px;">Quad HD</option>
            <option selected="" style="max-width: 250px;">Full HD</option>
            <option selected="" style="max-width: 250px;">HD Ready</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">RAM Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">12 GB</option>
            <option selected="" style="max-width: 250px;">8 GB</option>
            <option selected="" style="max-width: 250px;">6 GB</option>
            <option selected="" style="max-width: 250px;">4 GB</option>
            <option selected="" style="max-width: 250px;">2 GB</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Operating System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">Android</option>
            <option selected="" style="max-width: 250px;">IOS</option>
            <option selected="" style="max-width: 250px;">Windows</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Display Technology&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">OLED</option>
            <option selected="" style="max-width: 250px;">AMOLED</option>
            <option selected="" style="max-width: 250px;">TFT</option>
            <option selected="" style="max-width: 250px;">LCD IPS</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Battery Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">Upto 2000mAh</option>
            <option selected="" style="max-width: 250px;">Upto 3000mAh</option>
            <option selected="" style="max-width: 250px;">5000mAh and above</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Phone Manufacturer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">Xiaomi</option>
            <option selected="" style="max-width: 250px;">Samsung</option>
            <option selected="" style="max-width: 250px;">Apple</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Storage Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">32 GB</option>
            <option selected="" style="max-width: 250px;">128 GB</option>
            <option selected="" style="max-width: 250px;">256 GB</option>
            
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Stereo speaker support&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">Yes</option>
            <option selected="" style="max-width: 250px;">No</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Fast Charge Capability&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">Yes</option>
            <option selected="" style="max-width: 250px;">No</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Embedded Processors &nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select">
            <option selected="" style="max-width: 250px;">Apple A-Series</option>
            <option selected="" style="max-width: 250px;">Qualcomm</option>
            <option selected="" style="max-width: 250px;">Mediatek Helios Series</option>
		</select>
    </div> <!-- form-group// -->
    <p class="divider-text">
        <span class="bg-light"></span>
    </p>
    <div class="form-group text-center">
        <button type="submit" class="btn-primary btn btn-sm" id="submit">Search</button>
    </div> <!-- form-group// --> 
    
                                
                                                                 
</div>
</article>
</div> <!-- card.// -->

</div> 
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!-- Copyright -->
<!--container end.//-->
</body>
</html>
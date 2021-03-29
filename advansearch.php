<?php
session_start();
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

  
    $("select.screen").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#screen").val(selected);
    });

    $("select.ram").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#ram").val(select);
    });

    $("select.os").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#os").val(selected);
    });

    $("select.disp").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#disp").val(selected);
    });

    $("select.rom").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#rom").val(selected);
    });

    $("select.speaker").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#speaker").val(selected);
    });

    $("select.jack").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#jack").val(selected);
    });

    $("select.cores").change(function(){
        var selected = $(this).children("option:selected").val();
        $("#cores").val(selected);
    });

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

<div class="container" style="margin-top:10%; margin-bottom:10%;">

<div class="card bg-light p-1">
<article class="p-4">
	<h1 class="card-title mt-1 text-center" style="margin-bottom:5%; margin-top:15%; color:#33b5e5;">Advanced search options</h1>
    <h4 class="card-title text-center" style="margin-top:-2%; ">(Phone with specifications) </h4> 

	<p class="divider-text">
        <span class="bg-light"></span>
    </p>
	<div>
    <form class="form-group input-group" method="POST" action="./search_page.php">
    <h5 class="card-title mt-1">Screen Resolution&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select screen">
            <option style="max-width: 250px;">4K</option>
            <option style="max-width: 250px;" selected>Quad HD</option>
            <option style="max-width: 250px;">Full HD</option>
            <option style="max-width: 250px;">HD Ready</option>
            
		</select>
    
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">RAM Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select ram">
            <option style="max-width: 250px;">12 GB</option>
            <option style="max-width: 250px;" selected>8 GB</option>
            <option style="max-width: 250px;">6 GB</option>
            <option style="max-width: 250px;">4 GB</option>
            <option style="max-width: 250px;">3 GB</option>
            <option style="max-width: 250px;">2 GB</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Operating System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select os">
            <option style="max-width: 250px;">Android</option>
            <option style="max-width: 250px;" selected>IOS</option>
            <option style="max-width: 250px;">Windows</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Display Technology&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select disp">
            <option style="max-width: 250px;">OLED</option>
            <option style="max-width: 250px;">AMOLED</option>
            <option style="max-width: 250px;">TFT</option>
            <option style="max-width: 250px;" selected>LCD</option>
		</select>
    </div> <!-- form-group// -->
   
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Storage Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select rom">
            <option style="max-width: 250px;" selected>16 GB</option>
            <option style="max-width: 250px;">32 GB</option>
            <option style="max-width: 250px;">128 GB</option>
            <option style="max-width: 250px;">256 GB</option>
            
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Speaker support&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select speaker">
            <option style="max-width: 250px;" selected>Yes</option>
            <option style="max-width: 250px;">No</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Audio Jack&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select jack">
            <option style="max-width: 250px;" selected>Yes</option>
            <option style="max-width: 250px;">No</option>
		</select>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    <h5 class="card-title mt-1">Processors Core Count&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    	<div class="input-group-prepend">
		
		 </div>
        <!-- <input name="" class="form-control" placeholder="Email address" type="email"> -->
        <select class="custom-select cores">
            <option style="max-width: 250px;" selected>Dual Core</option>
            <option style="max-width: 250px;">Quad core</option>
            <option style="max-width: 250px;">Octa Core</option>
		</select>
    </div> <!-- form-group// -->

    <input type="text" class="form-control input-lg col-lg-4 input-search" value="1" id="opt"  name="option_sel" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Quad HD"  id="screen" name="screen" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="8 GB"  id="ram" name="ram" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="IOS"  id="os" name="os" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="LCD"  id="disp" name="disp" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="16 GB"  id="rom" name="rom" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Yes"  id="speaker" name="speaker" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Yes"  id="jack" name="jack" hidden>
    <input type="text" class="form-control input-lg col-lg-4 input-search" value="Dual Core"  id="cores" name="cores" hidden>
    <p class="divider-text">
        <span class="bg-light"></span>
    </p>
    <div class="form-group text-center">
        <button type="submit" class="btn-primary btn btn-sm" id="submit">Search</button>
    </form> <!-- form-group// --> 
    

                                                                 
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
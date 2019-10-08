
<!DOCTYPE html>
<html>
    <head>
        <title>
            BestSearch
        </title>
    </head>
	<meta charset="utf-8">
	
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="./css/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- particles.js container -->
<body id="particles-js">
<!--
    instagram: www.instagram.com/programmingtutorial
    site: programlamadersleri.net
-->

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
	echo "<script>console.log(".$_SESSION['id'].")</script>";
}

?>
<!-- Footer 1 - Left Social/Right Menu -->
<div class="search-text text-center col-lg"> 
	<h1 class="display-3">BestSearch</h1>
	<p id="ex1">A hassle free search engine for your favourite smartphone </p>
	<div class="best-search-form">
		<div id="search-form" class="form-search form-horizontal">
			<div class="form-group form-group-lg">
				<input type="text" class="form-control input-lg col-lg-4 input-search" value="" placeholder="" id="search" name="search">
				<button type="submit" class="btn-search btn col-mg-auto" id="submit" class="submit">Search</button>
			</div>
</div>
	</div>
	<p>Try searching : &nbsp;&nbsp;&nbsp;<a href="https://www.apple.com">iphones</a>&nbsp;&nbsp;<a href="https://www.android.com">Android</a>&nbsp;&nbsp;&nbsp;<a href="https://store.google.com/product/pixel_3a">Pixel camera</a></p>
	<p><a href="./advansearch.php">Advanced Search</a></p>             
</div>


<!-- Copyright -->
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!-- Copyright -->

<!-- scripts -->
<script src="./js/particles.js"></script>
<script src="./js/app.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

<script>
    var milliseconds = 4000;

placeholder = function(){
            
	this.write_placeholder = function(field, text, n) {
		if (n < (text.length)) {
			$('#'+field).attr("placeholder", text.substring(0, n+1));
			n++;
			setTimeout(function() {
				var obj = new placeholder();
				obj.write_placeholder(field, text, n)
			}, 65);
		}
	}              
	this.set_fields = function(objFields){
		for (var key in objFields) {
			// skip loop if the property is from prototype
			if (!objFields.hasOwnProperty(key)) continue;
				this.write_placeholder(key, objFields[key], 0);
				this.intervallize(objFields);
		}
	}               
	this.intervallize = function(objFields){
		var interval = setInterval(function() {
			for (var key in objFields) {
				if (!objFields.hasOwnProperty(key)) continue;
					var obj = new placeholder();
					obj.write_placeholder(key, objFields[key], 0);
			}
		}, milliseconds);
	}
                
	this.interval_time = function(ms){
		milliseconds = ms;
	}                
}
var obj = new placeholder();
obj.interval_time(10000); 
obj.set_fields({
  'search': 'Find out amazing things about smartphones'
});
	</script>
</body>
</html>
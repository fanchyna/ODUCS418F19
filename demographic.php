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
?>
<html>
    <head>
        <title>Demographic Form</title>
</head>
<link rel="stylesheet" href="./css/register.css">

<body style="background:#437993;">
<link rel="stylesheet" href="./css/demo_css.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">




<div class="container">
<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Please fillout the demographic form before you login</h3>
    <h4>Help us customize your search experience</h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Most Intersted Topic in smartphones" type="text" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your most favourite smartphone of the year" type="text"  required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your expectations from our website...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>

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
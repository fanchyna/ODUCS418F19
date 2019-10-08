<?php
require_once("./navbar.php");
require_once("./connect_db.php");
if(isset($_GET['id']))
{
	$email = $_GET['email'];
	$hemail = $_GET['id'];
	if(password_verify($email,$hemail)==TRUE)
	{
	$sql = "update users set verify_status='1' where email='$email'";
	if($conn->query($sql) === TRUE)
	{
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>";
		echo "</script>";
		echo "<script>swal('Welcome to BestSearch', 'Your account is verified. Enjoy customised search results from our partners', 'success').then(function(){
			window.location.href='index.php';
		});</script>";
	}
	else
	{
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>";
		echo "</script>";
		echo "<script>swal('Welcome to BestSearch', 'Your account verification failed. Enjoy anonymous searches from our partners', 'error').then(function(){
			window.location.href='index.php';
		});</script>";
	}
	}
	else
	{
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>";
		echo "</script>";
		echo "<script>swal('Welcome to BestSearch', 'Your account cannot be verified. Enjoy anonymous searches from our partners', 'error').then(function(){
			window.location.href='index.php';
		});</script>";
	}
}
?>
<html>
    <head>
        <title>Verify Email</title>
</head>
<link rel="stylesheet" href="./css/register.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body id="particles-js">

<!-- Copyright -->
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!-- Copyright -->
<!--container end.//-->
</body>
<script src="./js/particles.js"></script>
<script src="./js/app.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>
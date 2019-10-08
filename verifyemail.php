
<html lang="en">

<head>
  <title>Find Your Car</title>
  <meta charset="utf-8">
  <!-- BOOT STRAP 4 -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Scripts By Self   -->
  <link rel="stylesheet" type="text/css" href="style/theme.css">
  <script src="./site_scripts/login.js" type="text/javascript"></script>

</head>
<body>
<?php include('navbar.php'); ?>
<div style="padding:20% 33%;">
<?php

include("./server/connect_db.php");
$userid=$_REQUEST["uid"];

$sql1 = "UPDATE users SET verified=1 WHERE id=".$userid;
//echo $sql1; 
        $sql_result1 = $conn->query($sql1);
        if ($sql_result1 == TRUE){
            echo "<h4>Thanks for verifying your email.Please login in to continue</h4> ";
        }else{
            echo "<h4>Issues with email verify. Try again later</h4>";
        }
?>
</div>
</body>
</html>
<?php
include("./server/connect_db.php");
session_start();

    $uname = $_SESSION["username"];
    $uid = $_SESSION["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $emailaddress =$_POST['email_at_registration'];
        // sql1 = " UPDATE users SET fname='".$fname."',lname='".matcha."',email='".anusha.m21@gmail.com."' WHERE id= ".$uid;

        $sql1 = " UPDATE users SET fname='$fname',lname='$lname',email='$emailaddress' WHERE id= $uid";
        $sql_result1 = $conn->query($sql1);
        if ($sql_result1 == TRUE){
            echo "<script>console.log('successully updated');</script> ";
            // return true;
        }
    }

    echo "<script>console.log($uid);</script>";

    $sql0 = "SELECT  fname,lname,email,id FROM users WHERE  username = '$uname' ";
    // echo $sql0;
    $sql0_result = $conn->query($sql0);
    if ($sql0_result == TRUE) {
        while ($row = $sql0_result->fetch_assoc()) {

        $firstname = $row["fname"];
        $lastname = $row["lname"];
        $emailaddr = $row["email"];
    }
    
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Find You Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <!-- Scripts By Self   -->
    <link rel="stylesheet" type="text/css" href="style/theme.css">

</head>

<body>
    <?php include('navbar_homepage.php') ?>


    <div class="container centerPiece" id="registration_form">
        <h2><i class="fa fa-user carFAlg"></i> PROFILE DETAILS </h2>

        <form class="form_properties" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label class="form_font_heading" for="fname">First Name :</label>
                <div class="input-group">
                    <input id="f_name" name="f_name" type="text" class="form-control" size="100" value="<?php echo htmlspecialchars($firstname) ?>" required>
                    <span class="error error_red" id="spanf_name"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="form_font_heading" for="lname">Last Name :</label>
                <div class="input-group">
                    <input id="l_name" name="l_name" type="text" class="form-control" size="100" value="<?php echo htmlspecialchars($lastname) ?>" required>
                    <span class="error error_red" id="spanl_name"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="form_font_heading teal_heading" for="Email">Email :</label>
                <div class="input-group">
                    <input id="email_at_registration" name="email_at_registration" type="email" class="form-control" size="100" value="<?php echo htmlspecialchars($emailaddr) ?>" required>
                    <span class="error error_red" id="spanEmail_at_registration"></span>
                </div>
            </div>

            <div class="text-align form-group">
                <div>
                    <button class="btn_bg_color_green" id="update_profile" name="update_profile" type="submit" style="font-size: 20px"><i class="fa fa-edit" style="font-size: 20px"></i> UPDATE</button>
                </div>
            </div>
    </div>
    </form>
    </div>


</body>
<!-- 
<footer class="footerClass">
        <div class="col-sm-12" style="background:#af90e0;">

        <div text-align="center" style="padding:1%; color: white; width:80%;">@copyrights 
                </div>
          
        </div>
    </footer> -->

</html>
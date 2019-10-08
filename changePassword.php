<?php
session_start();
include("./server/connect_DB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//Password from GUI
$password = trim($_POST["currentPwd"]);
$newPassword = password_hash(trim($_POST["newPwd"]),PASSWORD_DEFAULT);
 $NewConfPassword =  password_hash(trim($_POST["newConfirmPwd"]),PASSWORD_DEFAULT);
$uid = $_SESSION['id'];
//Password in hashed format from DB
$sql1 = "SELECT password FROM users where id = " . $uid;
$sql_result1 = $conn->query($sql1);
if ($sql_result1 == TRUE) {
  if (mysqli_num_rows($sql_result1) == 1) {
    while ($row = $sql_result1->fetch_assoc()) {
      // Password is correct, so start a new session
      $hashedPwd = $row["password"];
      if (password_verify($password, $hashedPwd)) {
        echo "<script>console.log('Password is correct ');</script>";

        $sql2="update users set password='".$newPassword."' where id=".$_SESSION["id"];
        $sql_result2 = $conn->query($sql2);
         
        header("Location:./logout.php?changedpwd=yes");

      }
     }
    } 
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>change password</title>
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
    <script src="./site_scripts/changePassword.js" type="text/javascript"></script>

</head>

<body>
    <?php include('navbar_homepage.php') ?>
    <div class="container centerPiece" id="registration_form">
        <h2><i class="fa fa-user carFAlg"></i> CHANGE PASSWORD </h2>
        <form class="form_properties" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <input type="password" class="form-control" id="currentPwd" name="currentPwd" placeholder="Enter current password">
                <span class="error_red error" id="spanCurrentPwd"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="newPwd" name="newPwd" onkeyup="checkPasswordStrength('newPwd')" placeholder="Enter New password">
                <span class="error_red error" id="spannewPwd"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="newConfirmPwd" name="newConfirmPwd" onkeyup="checkPasswordStrength('newConfirmPwd')" placeholder="Confirm New password">
                <span class="error_red error" id="spannewConfPwd"></span>
            </div>
            <div class="text-align form-group">
                <div>
                    <button class="btn btn_bg_color_green" id="update_profile" name="update_profile" type="submit" style="font-size: 20px"><i class="fa fa-edit" style="font-size: 20px"></i> UPDATE</button>
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
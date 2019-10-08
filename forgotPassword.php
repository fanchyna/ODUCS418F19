
<?php
include("./server/connect_db.php");
include("./emailSendNotify.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email=$_REQUEST["fpemail"];

    if (!empty($email)) {
        // Prepare a select statement  
        $sql = "SELECT username FROM users WHERE  email = '$email' ";
        //echo $sql;
        $sql_result = $conn->query($sql);
        if ($sql_result == TRUE) {
          if (mysqli_num_rows($sql_result) == 1) {
            while ($row = $sql_result->fetch_assoc()) {
              // Password is correct, so start a new session\
             $newpwd=getRandomPassword(6);
              $password= password_hash($newpwd, PASSWORD_DEFAULT);
              $sql2="update users set password='$password' where email='$email'";
              //echo $sql2;
              $sql2_result = $conn->query($sql2);
              //echo "Rows updated".mysqli_affected_rows($conn);
              if (mysqli_affected_rows($conn)==1) {
                $emailFunc = new sendEmailTo();
                //var_dump($emailFunc);
                $emailresult = $emailFunc->sendEmailforForgotPassword($email,$newpwd);
                echo "<script>alert('An email with temporary password has be sent to your registered email. Please check your email to login using that password.');</script>";
                header("Location: ./index.php?fpe=1");
                }else{
                    echo "<script>alert('Temporary password has issues.Try again later');</script>";
                }
            }
          } else {
            echo "<script>alert('Cannot find an account with this email');</script>";
          }
        }
      }
}

function getRandomPassword($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
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
    <script>
    //Check if email is already existing in DB or not
            $(document).on("input", '#fpemail', function() {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var email = $('#fpemail').val().trim();

                if (($('#fpemail').val().length > 1) && (mailformat.test($('#fpemail').val()))) {
                    $('#spanEmail').html("");
                } else {
                    $('#spanEmail').html("<div class='warning_color'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp <span class='warning_color'>Enter correct format email address</span><i></div>");

                }
            });
    </script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark topnavbar">
  <a class="navbar-brand" href="javascript:void(0)">CAR 4 U</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button type="button" class="btn login_btn">
               <a href="./index.php" >BACK</a>
        </button>
      </form>
  </div>
</nav>
    <div class="container centerPiece" id="registration_form">
        <h2><i class="fa fa-user carFAlg"></i> FORGOT PASSWORD </h2>
        <form class="form_properties" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">

                <input type="text" class="form-control" id="fpemail" name="fpemail" placeholder="Enter Email Address">
                <span class="error_red error" id="spanEmail"></span>
            </div>
            <!-- <div class="form-group">
               
                <input type="password" class="form-control" id="newPwd" name="newPwd" onkeyup="checkPasswordStrength('newPwd')" placeholder="Enter current password"><span class="error_red error" id="spannewPwd"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="newConfirmPwd" name="newConfirmPwd" onkeyup="checkPasswordStrength('newConfirmPwd')" placeholder="Enter current password"><span class="error_red error" id="spannewConfPwd"></span>
            </div> -->
            <div class="text-align form-group">
                <div>
                    <button class="btn btn_bg_color_green" id="update_profile" name="update_profile" type="submit" style="font-size: 20px"><i class="fa fa-edit" style="font-size: 20px"></i>Submit</button>
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
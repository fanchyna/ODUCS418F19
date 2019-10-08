<?php
include("./server/connect_db.php");
session_start();

if ($_REQUEST["chp"] == 1) {
  echo "<script>alert('Password updated successfully.please login again');</script>";
}

if ($_REQUEST["fpe"] == 1) {
  echo "<script>alert('An email with temporary password has be sent to your registered email. Please check your email to login using that password.');</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if username is empty
  // echo $_POST["username"]." -- username";
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
    echo "<script>alert('Please enter username.');</script>";
    exit();
  } else {
    $username = trim($_POST["username"]);
  }
  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
    echo "<script>alert('Please enter your password.');</script>";
    exit();
  } else {
    $password = trim($_POST["password"]);
  }
  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement  
    $sql = "SELECT username ,password,id FROM users WHERE  username = '$username' ";
    //echo $sql;
    $sql_result = $conn->query($sql);
    if ($sql_result == TRUE) {
      if (mysqli_num_rows($sql_result) == 1) {
        while ($row = $sql_result->fetch_assoc()) {
          // Password is correct, so start a new session\
          $hashedPwd = $row["password"];
          // echo $hashedPwd;
          if (password_verify($password, $hashedPwd)) {
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $username;
            header("Location: ./home.php");
            echo "<script>alert('validated');</script>";
          } else {
            echo "<script>alert('Invalid username or password.Try again');</script>";
          }
        }
      } else {
        echo "<script>alert('Cannot username or password!');</script>";
      }
    }
  }
}


?>
<!DOCTYPE html>
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
  <?php include('navbar.php') ?>
  <div class="container-fluid mt-3">
    <!-- Container (Search bar Section) -->
    <div class="light_bg linearGradient">
      <div class="search-container">
        <h4 class="title centerAlign smallTitle">Searching for a Car? </h4>
        <form class="centerAlign" action="./about.php">
          <input type="text" class="search_box" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search search_image"></i></button>
          <br>
          <a id="registerLink" class="smallTitle" href="./advancedSearch.php" target="_self">Advanced Search</a>
        </form>
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <div id="myCarousel" class="carousel slide">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li class="item1 active"></li>
        <li class="item2"></li>
        <li class="item3"></li>
      </ul>
      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/img2.jpg" width="1100" height="500" alt="car 2">
        </div>
        <div class="carousel-item">
          <img src="./img/img3.jpg" width="1100" height="500" alt="car 3">
        </div>
        <div class="carousel-item">
          <img src="./img/img4.jpg" width="1100" height="500" alt="car 3">
        </div>
      </div>


      <a class="carousel-control-prev" href="#myCarousel">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>



  </div>
  </div>
</body>

<footer class="footerClass">
  <div class="col-sm-12" style="background:#af90e0;">
    <div text-align="center" style="padding:1%; color: white; width:80%;">@2019 copyright Anusha Matcha Web Programming odu
    </div>
  </div>
</footer>

</html>
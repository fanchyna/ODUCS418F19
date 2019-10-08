
<?php
session_start();
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
    <script src="./site_scripts/login.js" type="text/javascript"></script>

    <style>
    .img {
      max-width:100%;
      max-height: 300px;
      object-fit: fill;
    }
    </style>

</head>

<body>
 <?php include('navbar_homepage.php') ?>


<div class="container-fluid mt-3">
      <!-- <div class="light_bg" style="background:linear-gradient(to top, rgba(0, 0, 0, 0.35), rgba(51, 51, 51, 0.35)), url('./img/img1.jpg') no-repeat center center;height: 46vh;object-fit: fill;
    background-position: center 23%!important;background-size: cover;background-repeat:no-repeat;"> -->
    <div class="light_bg linearGradient">
        <div class="search-container">
          <h4 class="title centerAlign smallTitle">Searching for a Car? </h4>
          <form class="centerAlign" action="./about.php">
            <input type="text" class="search_box" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search search_image"></i></button>
           <br>
            <a id="registerLink" class ="smallTitle"  href="./advancedSearch.php" target="_self">Advanced Search</a>
          </form>
        </div>
      </div>

      <div class="card-columns">
        <div class="card bg-info">
          <div class="card-body text-center">
            <p class="card-text smallTitle">Some text inside the first card</p>
          </div>
        </div>
        <div class="card bg-info">
          <div class="card-body text-center">
            <p class="card-text smallTitle">Some text inside the second card</p>
          </div>
        </div>
        <div class="card bg-info">
          <div class="card-body text-center">
            <p class="card-text smallTitle">Some text inside the third card</p>
          </div>
        </div>
        <div class="card bg-info">
          <div class="card-body text-center">
            <p class="card-text smallTitle">Some text inside the fourth card</p>
          </div>
        </div>
        <div class="card bg-info">
          <div class="card-body text-center">
            <p class="card-text smallTitle">Some text inside the fifth card</p>
          </div>
        </div>
        <div class="card bg-info">
          <div class="card-body text-center">
            <p class="card-text smallTitle">Some text inside the sixth card</p>
          </div>
        </div>
      </div>


     <!-- <div id="myCarousel" class="carousel slide center">
                
                <ul class="carousel-indicators">
                  <li class="item1 active"></li>
                  <li class="item2"></li>
                  <li class="item3"></li>
                </ul>
              
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./img/img1.jpg" alt="car1 " class="img-fluid">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="./img/img2.jpg" alt="car 2" class="img-fluid">
                </div>
                <div class="carousel-item">
                  <img src="./img/img3.jpg"  alt="car 3" class="img-fluid">
                </div>
                <div class="carousel-item">
                  <img src="./img/img4.jpg"  alt="car 3" class="img-fluid">
                </div>
              </div>


              <a class="carousel-control-prev" href="#myCarousel">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel">
                  <span class="carousel-control-next-icon"></span>
                </a>
      </div> -->
<!-- Container (Search bar Section) -->
   </div>

</html>
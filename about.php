<?php
include("./server/connect_db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car 4 U</title>
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
    <script src="./site_scripts/registration.js" type="text/javascript"></script>
    <script src="./site_scripts/login.js" type="text/javascript"></script>

</head>

<body>
    <?php include('navbar_homepage.php') ?>
    <div class="container centerPiece">
        <div class="container ">
            <div class="media">
                <div class="media-left">
                    <i class="fas fa-car carFA"></i>
                    <!-- <img src="img_avatar1.png" class="media-object" style="width:60px"> -->
                </div>
                <div class="media-body">
                    <h4 class="media-heading search_image">WHAT IS MY PROJECT ABOUT?</h4>
                    <p>IMDB is the world's most popular and authoritative source for searching the
                </div>
            </div>
            <hr>
            <!-- Right-aligned media object -->
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading search_image">WHAT are the SEARCH Features?</h4>
                    <ul>
                        <li>Movies </li>
                        <li>TV Shows </li>
                        <li>celebrity content and many more</li>
                        <li>Year wise </li>
                    </ul>
                </div>
                <div class="media-right">
                    <i class="fas fa-question-circle carFA"></i>
                </div>
            </div>
        </div>
        <hr>
        <div class="media">
            <div class="media-left">
                <i class="fas fa-star carFA"></i>
                <!-- <img src="img_avatar1.png" class="media-object" style="width:60px"> -->
            </div>
            <div class="media-body">
                <h4 class="media-heading search_image">ANY SPECIAL FEATURES?</h4>
                <ul>
                    <li>Quiz Based Search </li>
                    <li>TV Shows </li>
                    <li>celebrity content and many more</li>
                    <li>Year wise </li>
                </ul>
            </div>
            <hr>
        </div>
        <hr>

        <div class="media">
            <div class="media-body">
                <h4 class="media-heading search_image">Data Set?</h4>
                <ul>
                    <li><a href="https://www.imdb.com/interfaces/">IMDB</a>
                    </li>
                </ul>
            </div>
            <div class="media-right">
                <i class="fas fa-database carFA"></i>
            </div>
        </div>

    </div>
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
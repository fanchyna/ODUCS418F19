<nav class="navbar navbar-expand-lg navbar-dark topnavbar">
  <a class="navbar-brand" href="javascript:void(0)">CAR 4 U</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./changePassword.php">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./about.php">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="nav-link smallTitle">Welcome,<?php echo $_SESSION["username"]; ?></a>
      <a class="nav-link" href="./logout.php">Logout</a>
      <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-success my-2 my-sm-0" type="button">Search</button> -->
    </form>
  </div>
</nav>


<!-- <div class="topnav bg_blueMagenta">
  <a href="#home"><h4>CAR 4 U</h4></a>
      <div>  
          <div style="float:left;">     
              <a href="./home">HOME</a>
              <a href="./profile.php">PROFILE</a>
              <a href="./changePassword.php">CHANGE PASSWORD</a>
              <a href="./about.php">ABOUT</a>
          </div>
          <div style="float:right;">     
            <button id="backToLogin" type="button" class="login_btn">
                <a href="./logout.php">LOGOUT</a>
            </button>
          </div>
      </div>
</div> -->
<!-- <div class="topnav bg_blueMagenta">
    <a href="#home"><h4>CAR 4 U</h4></a>
    
    <div class="search-container">
      <form action="#">
        <div class="row">       
            <a id="registerLink" href="registration.php" target="_self">Register Here</a>
            <a id="forgotPassword" href="forgotPassword.php" target="_self">Forgot Password?</a>
            <button type="button" class="btn login_btn"  data-toggle="modal" data-target="#myModal">
            <a>LOGIN</a>
            </button>
        </div>
      </form>
    </div>
  </div> -->
<nav class="navbar navbar-expand-lg navbar-dark topnavbar">
  <a class="navbar-brand" href="javascript:void(0)">CAR 4 U</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" id="registerLink" href="registration.php" target="_self">Register Here</a>
        </li>
        <li>
          <a class="nav-link"  id="forgotPassword" href="forgotPassword.php" target="_self">Forgot Password?</a>
        </li>
      </ul>
      <button type="button" class="btn login_btn" data-toggle="modal" data-target="#myModal">
        <a>LOGIN</a>
      </button>
      </form>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title carFAlg">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form name="loginForm" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control color_blueMagenta" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter User Name" />
            <span class="error warning_color" aria-live="polite" id="span_username"></span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control color_blueMagenta" name="password" id="password" placeholder="Enter Password" />
            <span class="error warning_color" aria-live="polite" id="span_pwd"></span>
          </div>
          <button style="text-align:center" type="button" id="loginbtn" class="btn_bg_color_green" value="Log in">Submit
          </button>

        </form>
      </div>
      <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" >Close</button>
          </div> -->
    </div>
  </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Duck Duck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!--   Scripts By Self   -->
    <link rel="stylesheet" type="text/css" href="style/theme.css">
    <script src="./site_scripts/registration.js" type="text/javascript"></script>
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
    <div class="container" id="regdiv">
        <form method="POST">
            <h2>Registration</h2>
            <div class="form-group">
                <label for="firstName">First Name</label>
                    <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>
                    <span class="error warning_color" aria-live="polite" id="spanfirstname"></span>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus>
                    <span class="error warning_color" aria-live="polite" id="spanLastName"></span>
            </div>
            <div class="form-group">
                <label for="userName">User Name</label>
                    <input type="text" id="userName" placeholder="User Name" class="form-control" autofocus>
                    <span class="error warning_color" aria-live="polite" id="spanuserName"></span>
            </div>
            <div class="form-group">
                <label for="email">Email* </label>
                    <input type="email" id="email" placeholder="Email" class="form-control" name="email">
                    <span class="error warning_color" aria-live="polite" id="spanEmail"></span>
            </div>
            <div class="form-group">
                <label for="email">Phone Number* </label>
                    <input type="phoneNumber" id="tel" placeholder="Phone Number" class="form-control" name="tel">
                    <span class="error warning_color" aria-live="polite" id="spanTel"></span>
            </div>
            <div class="form-group">
                <label for="password">Password*</label>
                    <input type="password" id="newpwd" name="newpwd" onkeyup="checkPasswordStrength('newpwd')" placeholder="Password" class="form-control">
                    <span class="error warning_color" aria-live="polite" id="spannewpwd"></span>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password*</label>
                    <input type="password" id="confPassword" name="confPassword" onkeyup="checkPasswordStrength('confPassword')"  placeholder="Confirm Password" class="form-control">
                    <span class="error warning_color" aria-live="polite" id="spanconfPassword"></span>
            </div>
<!--             
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div> -->
            <button type="submit" id="btn_submit" class="btn login_btn">Register</button>

    </div>

    </form>
    </div>
</body>

<!-- <footer class="footerClass">
        <div class="col-sm-12" style="background:#af90e0;">

        <div text-align="center" style="padding:1%; color: white; width:80%;">@copyrights 
                </div>
          
        </div>
    </footer> -->

</html>
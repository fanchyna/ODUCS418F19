<html>

<head>
  <meta name="google-signin-client_id"
    content="385121102241-7ets9shv8jsjcs6abumfimihacc2bush.apps.googleusercontent.com">
</head>

<body>
  <div id="my-signin2"></div>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  <script>
    function onSuccess(googleUser) {
      var profile = googleUser.getBasicProfile();
      console.log("ID: " + profile.getId()); // Don't send this directly to your server!
      console.log('Full Name: ' + profile.getName());
      console.log('Given Name: ' + profile.getGivenName());
      console.log('Family Name: ' + profile.getFamilyName());
      console.log("Image URL: " + profile.getImageUrl());
      console.log("Email: " + profile.getEmail());
      

      // The ID token you need to pass to your backend:
      var id_token = googleUser.getAuthResponse().id_token;
      console.log("ID Token: " + id_token);
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
    function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.disconnect().then(function () {
      console.log('User signed out.');
      window.location.reload();
    });
  }

  function checkRecaptcha() {
  var response = grecaptcha.getResponse();
  if(response.length == 0) { 
    //reCaptcha not verified
    alert("Not Verified!"); 
  }
  else { 
    //reCaptch verified
    alert("Verified!"); 
  }
}
// implement on the backend
function backend_API_challenge() {
    var response = grecaptcha.getResponse();
    $.ajax({
        type: "POST",
        url: 'https://www.google.com/recaptcha/api/siteverify',
        data: {"secret" : "6Le0A7oUAAAAAE2UIwcgbefk6TGZaPQt-QvFE-bR", "response" : response, "remoteip":"localhost"},
        contentType: 'application/x-www-form-urlencoded',
        success: function(data) { console.log(data); }
    });
}
    // var revokeAllScopes = function () {
    //   auth2.disconnect();
    // }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <a href="#" onclick="signOut();">Sign out</a>
  <form>
    <input type="text"></input>
    <div class="g-recaptcha" data-sitekey="6Le0A7oUAAAAAE2UIwcgbefk6TGZaPQt-QvFE-bR"></div>
    <input type="button" onclick="checkRecaptcha();" value="submit"></input>
  </form>
</body>

</html>
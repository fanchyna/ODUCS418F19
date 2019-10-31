<html>
<head>
    <title>
        Amazon Login
</title>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
 <script>
     $(document).ready(function(){
        
        $('#Logout').click(function(){ 
             amazon.Login.logout();
  });
     });
</script>
    

  <!-- <script type="text/javascript" src="https://assets.loginwithamazon.com/sdk/na/login1.js"></script> -->
<!-- <script type="text/javascript">
    $('#LoginWithAmazon').click(function() {
     
        options = {}
        options.scope = 'profile';
        options.scope_data = {
            'profile' : {'essential': false} 
        };
        amazon.Login.authorize(options,
            'http://localhost');
        return false;
    
})
</script> -->

</head>
<body>
<div id="amazon-root"></div>
 <script type="text/javascript">

    window.onAmazonLoginReady = function() {
      amazon.Login.setClientId('amzn1.application-oa2-client.5fbc79250fb349e883b80c3cf730d49a');
    };
    (function(d) {
      var a = d.createElement('script'); a.type = 'text/javascript';
      a.async = true; a.id = 'amazon-login-sdk';
      a.src = 'https://assets.loginwithamazon.com/sdk/na/login1.js';
      d.getElementById('amazon-root').appendChild(a);
    })(document);

</script>
<!-- <div id="amazon-root"></div> -->
<a href id="LoginWithAmazon">
    <img border="0" alt="Login with Amazon"
        src="https://images-na.ssl-images-amazon.com/images/G/01/lwa/btnLWA_gry_312x64.png"
        width="156" height="32" />
 </a>
 <script type="text/javascript">
    document.getElementById('LoginWithAmazon').onclick = function() {
        options = {}
        options.scope = 'profile';
        options.scope_data = {
            'profile' : {'essential': true} 
        };
        amazon.Login.authorize(options, function(response) {
         if ( response.error ) {
             alert('oauth error ' + response.error);
         return;
         }
         amazon.Login.retrieveProfile(response.access_token, function(response) {
             alert('Hello, ' + response.profile.Name);
             alert('Your e-mail address is ' + response.profile.PrimaryEmail);
             alert('Your unique ID is ' + response.profile.CustomerId);
             if ( window.console && window.console.log )
                window.console.log(response);
                amazon.Login.authorize(options,
            'http://localhost');
         });
     });
    
        return false;
    };
</script>
<button id="Logout">Logout</button> 
<script type="text/javascript">
  document.getElementById('Logout').onclick function() { 
     amazon.Login.logout();
  };
</script>
</body>
    </html>

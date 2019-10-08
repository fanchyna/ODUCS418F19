 function validateLogin(event) {
     var u_name = $('#username').val();
     var pwd = $('#password').val();
     $('.error').html('');
     if (u_name == "") {
         event.preventDefault();
         event.stopPropagation();
         $('#span_username').html("<p class='error_red paddingTop'>Enter FIRST NAME " + " " + '<i class = "fa fa-times" aria-hidden="true"></i></p>');
         $('#username').focus();
         return false;
     } else if (pwd == "") {
         event.preventDefault();
         event.stopPropagation();
         $('#span_pwd').html("<p class='error_red paddingTop'>Enter LAST NAME " + " " + '<i class = "fa fa-times error_red" aria-hidden="true"></i></p>');
         $('#password').focus();
         return false;
     } else {
         //alert('All Validations passed the data will be inserted in to DB');
         document.getElementById("loginForm").submit();
         //return true;
     }
 }

 $(document).on('click', '#loginbtn', function(event) {
     validateLogin(event);
 });

 $(document).ready(function() {
     // Activate Carousel
     $("#myCarousel").carousel();

     // Enable Carousel Indicators
     $(".item1").click(function() {
         $("#myCarousel").carousel(0);
     });
     $(".item2").click(function() {
         $("#myCarousel").carousel(1);
     });
     $(".item3").click(function() {
         $("#myCarousel").carousel(2);
     });

     // Enable Carousel Controls
     $(".carousel-control-prev").click(function() {
         $("#myCarousel").carousel("prev");
     });
     $(".carousel-control-next").click(function() {
         $("#myCarousel").carousel("next");
     });
 });
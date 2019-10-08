//Submits demographic form

//validate form on submiting and insert data into DB
$(document).on('click', '#btn_submit', function() {
    var fname = $('#firstName').val().trim();
    var lname = $('#lastName').val().trim();
    var uname = $('#userName').val().trim();
    var email = $('#email').val().trim();
    var telephone = $('#tel').val().trim();
    // var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var password = $('#newpwd').val();
    var confpwd = $('#confPassword').val();
    console.log(password);

    $('.error').html('');
    if (fname == "") {
        $('#spanfirstname').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter First Name ");
        $('#firstName').focus();
        return false;
    } else if (lname == "") {
        $('#spanLastName').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter Last Name");
        $('#lastName').focus();
        return false;
    } else if (uname == "") {
        $('#spanuserName').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter User Name ");
        $('#userName').focus();
        return false;
    } else if (email == "") {
        $('#spanEmail').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter email address" + " " + '<i class = "fa fa-times" aria-hidden="true"></i>');
        $('#email').focus();
        return false;
    } else if (password == "") {
        $('#spannewpwd').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter USER PASSWORD" + " " + '<i class = "fa fa-times" aria-hidden="true"></i>');
        $('#newpwd').focus();
        return false;
    } else if (telephone == "") {
        $('#spanTel').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter USER PASSWORD" + " " + '<i class = "fa fa-times" aria-hidden="true"></i>');
        $('#tel').focus();
        return false;
    } else if (confpwd == "") {
        $('#spanconfPassword').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Re-type PASSWORD" + " " + '<i class = "fa fa-times" aria-hidden="true"></i>');
        $('#spanconfPassword').focus();
        return false;
    } else if (password != confpwd) {
        $('#spanconfPassword').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp ***Re-Type the same password given above ");
        $('#confPassword').focus();
        return false;
    } else {
        console.log('All Validations passed the data will be inserted in to DB');

        $.ajax({
            url: './services/insert_registration.php',
            data: {
                'firstname': fname,
                'lastName': lname,
                'usrname': uname,
                'eaddr': email,
                'tele': telephone,
                'pwd': password,
            },
            type: 'POST',
            datatype: 'text',
            success: function(data) {
                alert(data);
                if (data == "success") {
                    $('#regdiv').html("<h1 class='success_green'><i class='fa fa-thumbs-up' aria-hidden='true'></i>&nbsp You have successfully submitted the form </h1>");
                }

            }
        });
        return false;
    }
});



//Check if email is already existing in DB or not
$(document).on("input", '#email', function() {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email = $('#email').val().trim();

    if (($('#email').val().length > 1) && (mailformat.test($('#email').val()))) {
        $.ajax({
            url: './services/check_email_phone_availability.php?opt=1',
            data: {
                'emailAddr': email
            },
            type: 'POST',
            datatype: 'text',
            success: function(data) {
                if (data == "failure") {
                    $('#spanEmail').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Email already exists");
                    $('#spanEmail').removeClass("success_green").addClass("warning_color");
                    $("#btn_submit").hide();
                } else {
                    $('#spanEmail').html("<i class='fa fa-thumbs-up' aria-hidden='true'></i>&nbsp Email available");
                    $('#spanEmail').removeClass("warning_color").addClass("success_green");
                    $("#btn_submit").show();
                }
            }
        });
    } else {
        $('#spanEmail').html("<div class='warning_color'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp <span class='warning_color'>Enter correct format email address</span><i></div>");

    }
});

//Check if phone is already existing in DB or not
$(document).on("input", '#tel', function() {
    var phoneformat = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
    var telephone = $('#tel').val().trim();

    if (($('#tel').val().length > 1) && (phoneformat.test($('#tel').val()))) {
        $.ajax({
            url: './services/check_email_phone_availability.php?opt=2',
            data: {
                'telphoneNumber': telephone
            },
            type: 'POST',
            datatype: 'text',
            success: function(data) {
                if (data == "failure") {
                    $('#spanTel').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Phone Number already exists");
                    $('#spanTel').removeClass("success_green").addClass("warning_color");
                    $("#btn_submit").hide();
                } else {
                    $('#spanTel').html("<i class='fa fa-thumbs-up' aria-hidden='true'></i>&nbsp Phone Number available");
                    $('#spanTel').removeClass("warning_color").addClass("success_green");
                    $("#btn_submit").show();
                }
            }
        });
    } else {
        $('#spanTel').html("<i class='fa fa-exclamation-triangle warning_color' aria-hidden='true'></i>&nbsp Enter correct Phone Number");

    }
});
//check if password entered is in correct format or not 
function checkPasswordStrength(tagID) {

    var strength = 0;
    console.log($("#" + tagID).val());
    if ($("#" + tagID).val().length < 8) {
        $("#span" + tagID).text("*** Password should be min of 8 characters");
    } else {
        $("#span" + tagID).text("");
    }

    var password = $("#" + tagID).val();

    if (password.length > 8) {
        strength += 1;
        $("#span" + tagID).text("");
    } else {
        $("#span" + tagID).text("Password should be min of 8 characters");
        $("#span" + tagID).attr("style", "color:red");
        return;
    }

    // If password contains both lower and uppercase characters, increase strength value.
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
        $("#span" + tagID).text("");
    } else {
        $("#span" + tagID).text("Password should contain both lower & upper characters");
        $("#span" + tagID).attr("style", "color:red");
        return;
    }

    // If it has numbers and characters, increase strength value.
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
        strength += 1;
        $("#span" + tagID).text("");
    } else {
        $("#span" + tagID).text("Password should contain numbers");
        $("#span" + tagID).attr("style", "color:red");
        return;
    }

    // If it has one special character, increase strength value.
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1;
        $("#span" + tagID).text("");
    } else {
        $("#span" + tagID).text("Password should contain one special character like $,!,&");
        $("#span" + tagID).attr("style", "color:red");
        return;
    }

    // If it has two special characters, increase strength value.
    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1;
        $("#span" + tagID).text("");
    }

    // Calculated strength value, we can return messages
    // If value is less than 2
    if (strength < 2) {
        $("#span" + tagID).attr("style", "color:red");
        $("#span" + tagID).text("weak password");
    } else if (strength == 2) {
        $("#span" + tagID).attr("style", "color:lightgreen");
        $("#span" + tagID).text("good password");
    } else {
        $("#span" + tagID).attr("style", "color:green");
        $("#span" + tagID).text("strong password");
    }
}
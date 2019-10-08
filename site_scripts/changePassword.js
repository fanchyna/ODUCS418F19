function checkPasswordStrength(tagID) {

    var strength = 0;
    console.log($("#" + tagID).val());
    if ($("#" + tagID).val().length < 8) {
        $("#span" + tagID).text("Password should be min of 8 characters");
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

function validateLogin() {
    var cgCurrentPwd = $('#currentPwd').val().trim();
    var cgNewPwd = $('#newPwd').val().trim();
    var cgNewConfPwd = $('#newConfirmPwd').val().trim();
    if (cgCurrentPwd == "") {
        $('#spanCurrentPwd').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter Current Password" + " " + '<i class = "fa fa-times" aria-hidden="true"></i>');
        return false;
    } else {
        $('#spanCurrentPwd').html("");
    }

    if (cgNewPwd == "") {
        $('#spannewPwd').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter New Password" + " " + '<i class = "fa fa-times" aria-hidden="true"></i>');
        return false;
    } else {
        $('#spannewPwd').html("");
    }

    if (cgNewConfPwd == "") {
        $('#spannewConfPwd').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Re-type New Password" + " " + '<i class = "fa fa-times" aria-hidden="true"></i>');
        return false;
    } else {
        $('#spannewConfPwd').html("");
    }

    if (cgNewPwd != cgNewConfPwd) {
        $('#spannewConfPwd').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp ***Re-Type the same password given above ");
        return false;
    } else {
        console.log('Passwords are matching');
        alert('Success validations');
        return true;
    }

}
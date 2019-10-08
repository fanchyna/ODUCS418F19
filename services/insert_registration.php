<?php
include("../server/connect_db.php");
include("../emailSendNotify.php");
// echo "into DB";
if (isset($_REQUEST['firstname']) && isset($_REQUEST['lastName']) && isset($_REQUEST['usrname']) && isset($_REQUEST['eaddr']) && ($_REQUEST['tele']) && isset($_REQUEST['pwd'])){
				$fname = trim($_REQUEST['firstname']);
				$lname = trim($_REQUEST['lastName']);
				$username = trim($_REQUEST['usrname']);
				$eaddress = trim($_REQUEST['eaddr']);
				$password=password_hash($_POST['pwd'], PASSWORD_DEFAULT);
				$telephone = trim($_REQUEST['tele']);
				$emailaddress = $conn->real_escape_string($eaddress);			
				$newpwd = $conn->real_escape_string($password);
				// $randonInviteCode ="INVITE".rand(10,100).time();
	$sql = "INSERT INTO users (fname,lname,username,email,phnum,password,verified) VALUES ('$fname','$lname','$username','$emailaddress',$telephone,'$newpwd',0)";
			if ($conn->query($sql) == TRUE)
					{
					  echo "success";
					  $emailFunc = new sendEmailTo();
					  $email = $emailFunc->sendEmailOnRegistration($emailaddress,mysqli_insert_id($conn));
					} else {
					  echo "fail";					
					}
}
        ?>
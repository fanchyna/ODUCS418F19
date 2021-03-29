<?php
require_once("./connect_db.php");
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql= "update users set password='$hash' where email='$email'";
    $result = $conn->query($sql);
    if($result === TRUE)
    {
        echo "1";
    }
    else
    {
        echo "Cannot update your password";
    }
}
else
{
    echo "Session Expired";
}
?>
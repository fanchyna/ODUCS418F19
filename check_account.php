<?php
session_start();
require_once("./connect_db.php");
$email = $_POST['email'];
$pass = $_POST['password'];
$sql = "select user_id,name,email,password,verify_status,ph_number from users where email='$email'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    if(password_verify($pass,$row['password']))
    {
        if($row['verify_status']=="0")
        {
            echo "Please verify your account by the link sent to your email";
        }
        else if($row['verify_status']=="1")
        {
            $_SESSION['id']=$row['user_id'];
            $_SESSION['family_name']=$row['name'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phnum']=$row['ph_number'];
            $_SESSION['our_system'] = 1;
            echo "1";
        }
    }
    else
    {
        echo "Invalid credentials";
    }
}
else
{
    echo "Account does not exist";
}
?>
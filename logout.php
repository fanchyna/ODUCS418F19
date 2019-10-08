<?php
session_start();
session_unset();
session_destroy();

if(isset($_REQUEST["changedpwd"])){
    header("Location:./index.php?chp=1");
}else{
    header("Location:./index.php");
}

?>


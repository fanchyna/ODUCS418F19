<?php
session_start();

$_SESSION['userID'] = 'j1wu';

echo "Create a session variable<br>";
echo $_SESSION['userID'];
?>


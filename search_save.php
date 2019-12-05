<?php
session_start();
require_once("./connect_db.php");
$user_id = $_SESSION['id'];
$doc_id = $_POST['doc_id'];
$query = $_POST['query'];
$sql = "Select * from history where doc_id='$doc_id';";
$res = $conn->query($sql);
if($res->num_rows > 0)
{
   echo "2";
}
else{
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT into history(user_id,doc_id,time,query) values ('$user_id','$doc_id','$date','$query');";
    if($conn->query($sql)===TRUE)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
}

?>
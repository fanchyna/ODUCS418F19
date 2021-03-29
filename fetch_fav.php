<?php
session_start();
require_once("connect_db.php");
$user_id = $_SESSION['id'];
$result = array();
$sql = "select doc_id,query,time from history where user_id='$user_id'";
$res = $conn->query($sql);
    if($res->num_rows > 0)
    {
        while($row = $res->fetch_assoc())
        {
            $str = $row['doc_id']." ".$row['time'];
            $result += [$str => $row['query']];
        }
        echo json_encode($result);
    }
    else
    {
        echo "1";
    }
?>
<?php
require_once("./connect_db.php");
$doc_id = $_POST['doc_id'];
$sql = "delete from history where doc_id='$doc_id'";
if($conn->query($sql)===TRUE)
{
    echo "1";
}
else
{
    echo "Cannot delete, Please contact admin!";
}
?>
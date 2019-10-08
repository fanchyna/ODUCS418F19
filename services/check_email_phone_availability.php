<?php
include("../server/connect_db.php");
$opt=$_REQUEST["opt"];
if (isset($_POST['emailAddr']) && $opt==1){
    $email = $_POST['emailAddr'];
        $sql1 = "SELECT email FROM users where email = '$email'";
        $sql_result1 = $conn->query($sql1);
        if ($sql_result1 == TRUE && $sql_result1->num_rows > 0) {
            echo "failure";
            }
             else {
            echo "success";
                 }
}

    if (isset($_POST['telphoneNumber']) && $opt==2){
        $phonenum = $_POST['telphoneNumber'];
            $sql2 = "SELECT phnum FROM users where phnum = '$phonenum'";
            $sql_result2 = $conn->query($sql2);
            if ($sql_result2 == TRUE && $sql_result2->num_rows > 0) {
                echo "failure";
                } 
                else {
                echo "success";
                  }
    }

?>
<?php 
require_once("./connect_db.php");
$email = $_POST['email'];
$check_records = "select * from users"; 
$result = $conn->query($check_records);
$flag = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['email']==$email)
        {
            $flag = 1;
            echo "0";
            break;
           
        }
    }
}
if($flag=="0"){
    echo "1";
}
$conn->close();
?>
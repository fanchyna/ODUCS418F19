<?php
function getTheQuery($num, $param){
if($num == 1){
    $query = "SELECT model_name from model where make_id = (SELECT make_id from make where make_name=".$param.");";
}
else if($num == 2){
    $query = "SELECT * from model where horsepower >=".$param.";";
}
else if($num == 3){
    $query = "SELECT * from make where make.make_id in (SELECT model.make_id from model where horsepower >".$param.");";
}
else if($num == 4){
    $query = "SELECT * from make JOIN model on make.make_id=model.make_id;";
}
return $query;
}

$servername = "localhost";
$username = "root";
$db = "cars";
$password = "";

$conn = new mysqli($servername, $username, $password, $db);

if($conn -> connect_error){
    die("connection failed!"). $conn->connect_error;
}
try{
if(isset($_GET['queried'])) {
    $toQuery = getTheQuery($_GET['queryNumber'], $_GET['queryParameter']);
    $result = $conn->query($toQuery);
    if($result->num_rows > 0)
    {
        echo "Query <i>".$toQuery."</i> received <b>".$result->num_rows." Rows...</b><br><br>";
        echo "<table padding=2 border=1>\n";
        $resultNum = 0;
        while($row=$result->fetch_assoc())
        {
            if($resultNum == 0)
            {
                echo "<tr>";
                foreach($row as $key=>$value)
                {
                    echo "<th>".$key;
                }
            }
            echo "<tr>";
            foreach($row as $value)
            {
                echo "<td>".$value;
            }
            $resultNum++;
        }
        echo "</table>";
    }
    else
    {
        echo "No tables or records found";
    }
}
mysqli_close($conn);
}
catch(Exception $e)
{
    echo "Something terrible happened";
}
?>
<html>
<head>
<title>Sample handson</title>
</head>
<body>
    <form action="" method="GET">
    <input type="radio" name="queryNumber" value="1">Get all models by make........<br>
    <input type="radio" name="queryNumber" value="2">Get all makes above a specified horsepower........<br>
    <input type="radio" name="queryNumber" value="3">Get all makes that have a car over a specified horsepower........<br>
    <input type="radio" name="queryNumber" value="4">Get all car info from db........<br>
    <input type="text" name="queryParameter">
    <input type="text" name="queried" value="true" hidden>
    <input type="submit">
    </form>
</body>
</html>
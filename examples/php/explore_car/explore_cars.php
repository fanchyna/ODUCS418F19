<?php

function getTheQuery($qnum, $param) {
    if($qnum == 1) {
      $query = "SELECT model_name FROM models WHERE make_id=(SELECT make_id FROM makes WHERE make_name=\"" . $param . "\");";
    }
    elseif($qnum == 2) {
      $query ="SELECT * FROM models WHERE horsepower >= " . $param . ";";
    }
    elseif($qnum == 3) {
      $query = "SELECT * FROM makes WHERE makes.make_id IN (SELECT models.make_id FROM models WHERE horsepower >= " . $param. ");";
    }
    elseif($qnum == 4) {
      $query = "SELECT * FROM makes JOIN models ON makes.make_id=models.make_id;";
    }
    return $query;
}

$servername = "localhost";
$username = "root";
$password = "september2019";
$dbname = "cars";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("connection failed: ") . $conn->connect_error;
}

if (defined($_GET['queried'])){
  $toQuery = getTheQuery($_GET['queryNumber'], $_GET['queryParameter']);
  $result = $conn->query($toQuery);
  if($result->num_rows > 0) {
    echo "Query <i>" . $toQuery . "</i> received <b>" . $result->num_rows . "rows ...</b><br><br>";
    echo "<table padding=2 border=1>\n";
    $resultNum=0;
    while($row=$result->fetch_assoc()) {
      if($resultNum == 0) {
        echo "<tr>";
        foreach($row as $key => $value) {
          echo "<th>" . $key;
        }
      }
      echo "<tr>";
      foreach ($row as $value) {
        echo "<td>" . $value;
      }
      $resultNum++;
    }
    echo "</table>";
  }
}

mysqli_close($conn);
?>

<html>
<head>
<title>Just a quick example...</title></head>
<body>
<form method="GET">
  <input type="radio" name="queryNumber" value="1"> Get all models by make... <br>
  <input type="radio" name="queryNumber" value="2"> Get all makes above a specified horsepower<br>
  <input type="radio" name="queryNumber" value="3"> Get all makes that have a car over a specified horsepower<br>
  <input type="radio" name="queryNumber" value="4"> Get all car info from DB<br>
  <input type="hidden" name="queried" value="true">
  <input type="text" name="queryParameter">
  <input type="submit">
</form>
</body>
</html>

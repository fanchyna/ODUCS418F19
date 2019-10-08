<?php
include("./server/connect_db.php");
function getTheQuery($qnum, $param)
{
  if ($qnum == 1) {
    $query = "SELECT model_name FROM model WHERE makeid=(SELECT makeid from make WHERE make_name=\"" . $param . "\");";
  } elseif ($qnum == 2) {
    $query = "SELECT * FROM model WHERE horse_power >= " . $param . ";";
  } elseif ($qnum == 3) {
    $query = "SELECT * FROM make where make.makeid IN (SELECT model.make_id FROM model WHERE horse_power >" . $param . ");";
  } elseif ($qnum == 4) {
    $query = "SELECT * FROM make JOIN model ON make.makeid=model.make_id";
  }
  return $query;
}

if (isset($_GET['queried'])) {
  $toQuery = getTheQuery($_GET['queryNumber'], $_GET['queryParameter']);
  $result = $conn->query($toQuery);
  if ($result->num_rows > 0) {
    echo "Query <i>" . $toQuery . "</i> recieved <b>" . $result->num_rows . " Rows ...</b><br><br>";
    echo "<table padding =2 border =1>\n";
    $resultNum = 0;
    while ($row = $result->fetch_assoc()) {
      if ($resultNum == 0) {
        echo "<tr>";
        foreach ($row as $key => $value) {
          echo "th" . $key;
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
  else
  {
    echo "No records found";
  }
}
mysqli_close($conn);
?>

<html>

<head>
  <title> just quick example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <script src="./site_scripts/jquery.min.js"></script>
  <link rel='stylesheet' href='./style/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <script src="./bootstrap/js/bootstrap.min.js"></script>
  <script src="./site_scripts/popper.min.js"></script>
  <!-- <link rel="stylesheet" href="./fontwesome/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Scripts By Self   -->
  <link rel="stylesheet" type="text/css" href="style/theme.css">

</head>

<body>
  <div id="#searchalign">
  
      <div class="container">
        <form method="GET">
          <div class="form-check-inline">
            <label class="form-check-label" for="radio1">
              <input type="radio" class="form-check-input" id="radio1" name="queryNumber" value="1">GET ALL Models by make ..<br>
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label" for="radio2">
              <input type="radio" class="form-check-input" id="radio2" name="queryNumber" value="2">Get all makes above a specified horsepower ..<br>
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio2" name="queryNumber" value="3">Get all makes that have a car over a specified horsepower .. <br>
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio2" name="queryNumber" value="4">Get all car info from DB .. <br>
            </label>
          </div>
          <input type="hidden" name="queried" value="true">
          <input type="text" name="queryParameter">

          <button type="submit" class="btn btn-primary">Submit</button>
          </form>

      </div>
  </div>
</body>

</html>
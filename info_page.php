<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<script>
    $(document).ready(function(){
        $("#save_btn").click(function(){
          var name = $("#name").html();
            var stat = <?php
            session_start();
                if(isset($_SESSION['id']))
                {
                    echo "1";
                }
                else{
                    echo "0";
                }
            ?>;
            if(stat == "1")
            { 
            $.ajax({
              async: false,
              url: "./search_save.php",
              type :"post",
              data:{
                "user_id":<?php 
                    if(isset($_SESSION['id']))
                    {
                        echo $_SESSION['id'];
                    }
                    else
                    {
                        echo "dummy";
                    } ?>,
                "doc_id":<?php echo $_GET['disp_id']; ?>,
                "query":name,
              },
              success :function(res){
                if(res=="1")
                {
                  alert("Result added to favourites. Check your profile to view favourites.");
                }
                else if(res=="2")
                {
                    alert("Result already present in your favourites");
                }
                else if(res=="0")
                {
                  alert("Result cannot be stored! Please contact admin.");
                }
              }
            });
            }
            else
            {
                swal('Welcome to BestSearch','Please login to save your favourites', 'error');
            }
        })
        $("#logout").click(function(){
			 $.ajax({
				 url:"./logout.php",
				 success: function(){
					window.location.href="index.php";
				 }
			 })
		})
    });
</script>

<?php
session_start();
require_once("./navbar.php");
require_once("./connect_db.php");
require './vendor/autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_WARNING);
if(!(isset($_GET['disp_id'])))
{
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>";
		echo "</script>";
		echo "<script>swal('Welcome to BestSearch','Display results weren\'t available', 'error').then(function(){
			window.location.href='index.php';
		});</script>";
}
if(isset($_SESSION['id']))
{
  echo "<script>$('#display').html('Welcome ".$_SESSION['family_name']."');</script>";
  echo "<script>$('#logout').attr('hidden',false);</script>";
  echo "<script>$('#contribute').attr('hidden',false);</script>";
}
else
{
  echo "<script>$('#logout').attr('hidden',true);</script>";
}
if(isset($_COOKIE['id']))
{
	echo "<script>$('#display').html('Welcome ".$_COOKIE['family_name']."');</script>";
	echo "<script>$('#logout').attr('hidden',false);</script>";
	$_SESSION['id']= $_COOKIE['id']; 
	$_SESSION['family_name']= $_COOKIE['family_name']; 
	$_SESSION['email']= $_COOKIE['email']; 
	// setcookie("id", "", time()-3600);
	setcookie("family_name", "", time()-3600);
	setcookie("email", "", time()-3600);
	setcookie("id", "", time()-3600);
}
$query_id = strip_tags($_GET['disp_id']);
use Elasticsearch\ClientBuilder;
$hosts = ['http://localhost:9200'];
$client = ClientBuilder::create()->setHosts($hosts)->build();
$params = [
    'index' => 'mobile',
    'body' => [
     'from' => 0,
     'size' => 10000,
        'query' => [
            'match'=>[
                '_id'=>$query_id
            ]
        ]
    ]
]; 
$response = $client->search($params);
$val = $response['hits']['value'];
if($val === "0")
{
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>";
		echo "</script>";
    echo "<script>swal('Welcome to BestSearch','Display results weren\'t available', 'error').then(function(){
        window.location.href='index.php';
    });</script>";
}
$results = $response['hits']['hits'];
echo '<h3 style="margin-top:6%; text-align:center; color:white;"><b>'.$results[0]['_source']['brand'].' '.$results[0]['_source']['model'].'</b></h3><br>';
echo '<img class="img-fluid rounded mx-auto d-block" style="margin-top:1px; border:2px solid grey;" src="'.$results[0]['_source']['img_url'].'" alt="Smiley face" width="200" height="250">';
echo '<br><div class="text-center">
<p id="name" hidden>'.$results[0]['_source']['brand'].' '.$results[0]['_source']['model'].'</p>
<button type="button" class="btn btn-primary btn-sm text-center" id="save_btn">Save to favourites</button>
</div><br>';
echo '<table class="table table-striped text-center" style="max-width:60%; background:white; margin:0 auto; margin-bottom:5%;">
<thead>
  <tr>
    <th scope="col">TITLES</th>
    <th scope="col">SPECIFICATIONS</th>
  </tr>
</thead><tbody>';
foreach ($results[0]['_source'] as $key => $value)
{
   echo '<tr>
    <td><b>'.$key.'</b></td>';
    if($results[0]['_source'][$key]=="")
    {
        echo '
        <td>Information not available</td>
        </tr>';
    }
    else
    {
        echo '
        <td><b style="color:green;">'.$results[0]['_source'][$key].'</b></td>
        </tr>';
    }
   
}
echo '</tbody></table>';
?>
<html>
    <head>
        <title>Information Page</title>
</head>
<link rel="stylesheet" href="./css/register.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body style="background:#437993;">

<!-- Copyright -->
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!-- Copyright -->
<!--container end.//-->
</body>


</html>
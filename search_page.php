<?php
session_start();
require_once("./connect_db.php");    
require_once("./navbar.php");
require './vendor/autoload.php';
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
?>
<html>
    <head>
        <title>
            Search Results
        </title>
        <link rel="stylesheet" media="screen" href="./css/search.css">
        <link rel="stylesheet" media="screen" href="./css/main.css">
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
</head>
<body>
<br>
</div>
<!-- Main body of text -->
<br><br><br>

<div class="searchresults">
  <h3>BestSearch Results</h3>
    <p id="stat"></p>
    <div style="width:900px;">
<form class="form-inline active-cyan-3 active-cyan-4" method="POST">
<i class="fas fa-search" aria-hidden="true"></i>
  <input type="text" class="form-control input-lg col-lg-4 input-search" value="0" id="opt"  name="option_sel" hidden>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search using keywords and hit enter" name="search" aria-label="Search">
  &nbsp;<input type="submit" hidden>
  <a href="./advansearch.php"><button type="button" class="btn btn-outline-primary btn-sm" >Advanced Search</button></a>
</form>
</div>
    <?php
 use Elasticsearch\ClientBuilder;
 $query = strip_tags($_POST['search']);
 if($_POST['option_sel']=="0")
 {
  $hosts = ['http://localhost:9200'];
  $client = ClientBuilder::create()->setHosts($hosts)->build();
  $params = [
      'index' => 'mobile',
      'body' => [
       'from' => 0,
       'size' => 10000,
          'query' => [
              'multi_match' => [
               'query' => $query,
               'fields'=> ['brand','model']
              ]
          ]
      ]
  ]; 
  $response = $client->search($params);
  $results_count = sizeof($response['hits']['hits'],0);
  if($results_count===0)
  {
    echo "<script>swal('Search Results', 'No results found. Try with new or modify the query', 'error').then(function(){
     window.location.href='index.php';
   });</script>";
  }
  $time_took = ((int)($response['took'])/1000);
  $results = $response['hits']['hits'];
  echo "<script>\$(document).ready(function(){
    $('#stat').html('About ".$results_count." results in ".$time_took." seconds');
  })</script>";
 echo "<div class='cards' style='margin-bottom:6%;'>";
  for ($i=0; $i<$results_count; $i++)
  {
     echo '
       <div id="'.$results[$i]['_id'].'" class="p-3">
       <img src="'.$results[$i]['_source']['img_url'].'" alt="Smiley face" width="100" height="100">
       <div style="display:inline-block;" id="content">
       <h4><a href="#" id="brand">'.$results[$i]['_source']['brand'].' '.$results[$i]['_source']['model'].'</a></h4>
      <br>
       <p class="snippet" id="model_details"><b>Announced</b> in: '.$results[$i]['_source']['announced'].'. <b>Current Status: </b> '.$results[$i]['_source']['status'].'</p>
     </div>  
   </div>';
  }
  echo "</div>";
 }
 else if($_POST['option_sel']=="1")
 {
  $screen = $_POST['screen'];
  $ram = $_POST['ram'];
  $os = $_POST['os'];
  $disp = $_POST['disp'];
  $rom = $_POST['rom'];
  $speaker = $_POST['speaker'];
  $jack = $_POST['jack'];
  $cores = $_POST['cores'];
  $query = $screen." ".$ram." ".$os." ".$disp." ".$rom." ".$speakers." ".$jack." ".$cores;
  $hosts = ['http://localhost:9200'];
  $client = ClientBuilder::create()->setHosts($hosts)->build();
  $params = [
      'index' => 'mobile',
      'body' => [
       'from' => 0,
       'size' => 10000,
          'query' => [
              'multi_match' => [
               'query' => $query,
               'fields'=> ['display_resolution','RAM','OS','display_type','internal_memory','loud_speaker','audio_jack','CPU']
              ]
          ]
      ]
  ]; 
  $response = $client->search($params);
  $results_count = sizeof($response['hits']['hits'],0);
  if($results_count===0)
  {
    echo "<script>swal('Search Results', 'No results found. Try with new or modify the query', 'error').then(function(){
     window.location.href='index.php';
   });</script>";
  }
  $time_took = ((int)($response['took'])/1000);
  $results = $response['hits']['hits'];
  echo "<script>\$(document).ready(function(){
    $('#stat').html('About ".$results_count." results (".$time_took." seconds)');
  })</script>";
 echo "<div class='cards' style='margin-bottom:6%;'>";
  for ($i=0; $i<$results_count; $i++)
  {
     echo '
       <div id="'.$results[$i]['_id'].'" class="p-3">
       <img src="'.$results[$i]['_source']['img_url'].'" alt="Smiley face" width="100" height="100">
       <div style="display:inline-block;" id="content">
       <h4><a href="#" id="brand">'.$results[$i]['_source']['brand'].' '.$results[$i]['_source']['model'].'</a></h4>
      <br>
       <p class="snippet" id="model_details"><b>Announced</b> in: '.$results[$i]['_source']['announced'].'. <b>Current Status: </b> '.$results[$i]['_source']['status'].'</p>
     </div>  
   </div>';
  }
  echo "</div>";
 }
?>
</div>
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>


</body>
</html>
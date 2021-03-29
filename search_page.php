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
  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

  <link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/styles/default.min.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/highlight.min.js"></script>
<script src="//bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script type='text/javascript' src='./JavaScriptSpellCheck/include.js' ></script>
  <script>
  var timoutInterval
function keyStroke(){
clearTimeout(timoutInterval)
timoutInterval =setTimeout( ajaxDYM(),500)
}

function fixSuggestions(link){
         SearchBoxText = document.getElementById('search').value = link.innerHTML;
     link.innerHTML = "";
}

function ajaxDYM(){
        var SearchBoxText = document.getElementById('search').value;

        o = $Spelling.AjaxDidYouMean(SearchBoxText)

        o.onDidYouMean = function(result){
                        var oSuggestionLink= document.getElementById('suggestionLink');
                if(result){

                oSuggestionLink.innerHTML = result
        }else{
                oSuggestionLink.innerHTML = "";
        }
        }
}
  </script>

  <script>
  $(document).ready(function(){
    var options = {
    valueNames: [ 'name', 'category' ],
    page: 10,
    pagination: true
  };

  var listObj = new List('listId', options);
 
  var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;
        var grammar = '#JSGF V1.0;'
        var recognition = new SpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'en-US';
        recognition.interimResults = true;
        recognition.onresult = function(event) {
            var last = event.results.length - 1;
            var command = event.results[last][0].transcript;
           
			$("#search").val(command);
        };
        recognition.onspeechend = function() {
			recognition.stop();
			// $("#form_sub").ajaxSubmit({url: 'search_page.php', type: 'post'});
      $("#msg").html("Recorded, Initiating search operation.....");
			setTimeout(function(){document.getElementById("form_sub").submit(); }, 3000);
			
        };
        recognition.onerror = function(event) {
            message.textContent = 'Error occurred in recognition: ' + event.error;
        }        
        // document.querySelector('#btnGiveCommand').addEventListener('click', function(){
        //     recognition.start();
        // });
		$("#btnGiveCommand").click(function(){
      $("#msg").html("Recording...");
			recognition.start(); 
		});


		$("#logout").click(function(){
			 $.ajax({
				 url:"./logout.php",
				 success: function(){
					window.location.href="index.php";
				 }
			 })
		})


    $("#brand_taken").click(function(){
      var br = $("#brand_taken").html();
      $("#search").val(br);
      setTimeout(function(){document.getElementById("form_sub").submit(); }, 1000);
    })
  });


  </script>
</head>
<body>
<br>
</div>
<!-- Main body of text -->
<br><br><br>

<div class="searchresults">
<?php  
if($_POST['option_sel']=="0")
{
  $query = strip_tags($_POST['search']); echo "<b><p class='snippet' id='results'>Displaying results for \"<b  style='color:green;'>".$query."</b>\"</p></b>";
}
else if($_POST['option_sel']=="1"){
  $screen = $_POST['screen'];
  $ram = $_POST['ram'];
  $os = $_POST['os'];
  $disp = $_POST['disp'];
  $rom = $_POST['rom'];
  $speaker = $_POST['speaker'];
  $jack = $_POST['jack'];
  $cores = $_POST['cores'];

  $query = $screen." ".$ram." ".$os." ".$disp." ".$rom." ".$speakers." ".$jack." ".$cores;
  echo "<b><p class='snippet' id='results'>Displaying results for following search terms: <ul>
  <li>Screen Quality: <b style='color:green;'>".$screen."</b></li>
  <li>RAM Capacity: <b style='color:green;'>".$ram."</b></li>
  <li>Operating System: <b style='color:green;'>".$os."</b></li>
  <li>Display Type: <b style='color:green;'>".$disp."</b></li>
  <li>Memory: <b style='color:green;'>".$rom."</b></li>
  <li>Speaker Support: <b style='color:green;'>".$speaker."</b></li>
  <li>Audio Jack Support: <b style='color:green;'>".$jack."</b></li>
  <li>Number of Processing cores: <b style='color:green;'>".$cores."</b></li>
  </ul></b>";
}
?>

  <h3>BestSearch Results</h3>

   <b><p id="stat" style="display:inline-block;"></p></b>
    <div style="width:900px;">
    <button id='btnGiveCommand' style="background-color:transparent; border: none;"><i class="fas fa-microphone" style="color:black;"></i>&nbsp;</button>
    <p style="display:inline-block;" id="msg">Click on the microphone button to start voice search</p>
<form class="form-inline active-cyan-3 active-cyan-4" method="POST" id="form_sub">
<i class="fas fa-search" aria-hidden="true"></i>
  <input type="text" class="form-control input-lg col-lg-4 input-search" value="0" id="opt"  name="option_sel" hidden>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search using keywords and hit enter" name="search" aria-label="Search" id="search" spellcheck="true" onKeyUp="keyStroke()">
  &nbsp;<input type="submit" hidden>
  
		
  <a href="./advansearch.php"><button type="button" class="btn btn-outline-primary btn-sm" >Advanced Search</button></a>
  <br>
  <br>
 <div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id='suggestionLink' href='#' style="color:orange;" onclick='fixSuggestions(this); return false;'></a></div>
</form>

</div>
    <?php
 use Elasticsearch\ClientBuilder;
 $query = strip_tags($_POST['search']);
 $values = explode(" ",$query); 
 $correct_brand = '';
 if($_POST['option_sel']=="0")
 {
  $hosts = ['http://localhost:9200'];
  $client = ClientBuilder::create()->setHosts($hosts)->build();
 
  foreach ($values as $va)
  {
    $param_brand = [
      'index' => 'mobile',
      'body' => [
       'from' => 0,
       'size' => 10000,
          'query' => [
             'fuzzy'=>[
               'brand'=>$va
             ]
          ]
      ]
  ];
  $response = $client->search($param_brand);
  $results_count = sizeof($response['hits']['hits'],0);
  $results = $response['hits']['hits'];
  if($results_count!=0)
  {
    if($results[0]['_source']['brand']!=$va)
    {
      $correct_brand = $results[0]['_source']['brand'];
    }
  }
  }

  if($correct_brand!='')
  {
      echo "<p style='margin-top:-5%; display:inline-block;'>Were you searching for brand:&nbsp; <p id='brand_taken' style='color:green; display:inline-block;'>".$correct_brand."</p>?</p><br>";
  }
  
  $params = [
    'index' => 'mobile',
    'body' => [
     'from' => 0,
     'size' => 10000,
        'query' => [
            'multi_match' => [
             'query' => $query,
             'fields'=> ['brand','model','display_resolution','RAM','OS','display_type','internal_memory','loud_speaker','audio_jack','CPU']
            ]
        ]
    ]
]; 
  $response = $client->search($params);
  $results_count = sizeof($response['hits']['hits'],0);
  $_SESSION['num_results'] = $results_count;
  $num_pages = $results_count/10;
  if($results_count===0)
  {
    if($correct_brand!='')
    {
        $query = $correct_brand;
        $params = [
          'index' => 'mobile',
          'body' => [
           'from' => 0,
           'size' => 10000,
              'query' => [
                  'multi_match' => [
                   'query' => $query,
                   'fields'=> ['brand','model','display_resolution','RAM','OS','display_type','internal_memory','loud_speaker','audio_jack','CPU']
                  ]
              ]
          ]
      ];
      $response = $client->search($params);
      $results_count = sizeof($response['hits']['hits'],0);
      $_SESSION['num_results'] = $results_count;
      $num_pages = $results_count/10;
      $time_took = ((int)($response['took'])/1000);
  $results = $response['hits']['hits'];
  
  echo "<script>\$(document).ready(function(){
    $('#stat').html('About ".$results_count." results in ".$time_took." seconds');
   
  });
  </script>";

  

 echo "<div id='listId'><div class='cards' style='margin-bottom:6%;'>";
 echo "<ul class='list' style='list-style:none;'>";
  for ($i=0; $i<$results_count; $i++)
  {
     echo '
     
       <li><div class="p-3">
       <img style="margin-top:-6%;" src="'.$results[$i]['_source']['img_url'].'" alt="Smiley face" width="100" height="130">
       <div style="display:inline-block;" id="content">';
      
       echo '<h4><a href="http://localhost/info_page.php?disp_id='.$results[$i]['_id'].'" id="brand">'.$results[$i]['_source']['brand'].' '.$results[$i]['_source']['model'].'</a></h4>
      <br>
       <p class="snippet" id="model_details"><b>Announced</b> in: '.$results[$i]['_source']['announced'].'. <b>Current Status: </b> '.$results[$i]['_source']['status'].'</p>
       ';
      if($results[$i]['_source']['CPU']=="")
      {
        echo '<br><p class="snippet" id="model_details"><b>CPU: </b>No information available
      
        </div>  
      </div></li>';
      }else
      {
        echo '<br><p class="snippet" id="model_details"><b>CPU: </b>'.$results[$i]['_source']['CPU'].'
      
        </div>  
      </div></li>';
      }
  }
  echo "</ul><div style='text-align:center;'><b><h5>Pagination options</h5></b></div><div id='pag'><ul class='pagination'></ul></div></div></div>";
  $arr = explode(" ",$query);
  foreach ($arr as $val)
 {
  echo "<script>$('.list').highlight('".$val."');</script>";
 }
    }
    else{
      echo "<script>swal('Search Results', 'No results found. Try with new or modify the query', 'error').then(function(){
        window.location.href='index.php';
      });</script>";
    }
    

  }
  $time_took = ((int)($response['took'])/1000);
  $results = $response['hits']['hits'];
  
  echo "<script>\$(document).ready(function(){
    $('#stat').html('About ".$results_count." results in ".$time_took." seconds');
   
  });
  </script>";

  

 echo "<div id='listId'><div class='cards' style='margin-bottom:6%;'>";
 echo "<ul class='list' style='list-style:none;'>";
  for ($i=0; $i<$results_count; $i++)
  {
     echo '
     
       <li><div class="p-3">
       <img style="margin-top:-6%;" src="'.$results[$i]['_source']['img_url'].'" alt="Smiley face" width="100" height="130">
       <div style="display:inline-block;" id="content">';
      
       echo '<h4><a href="http://localhost/info_page.php?disp_id='.$results[$i]['_id'].'" id="brand">'.$results[$i]['_source']['brand'].' '.$results[$i]['_source']['model'].'</a></h4>
      <br>
       <p class="snippet" id="model_details"><b>Announced</b> in: '.$results[$i]['_source']['announced'].'. <b>Current Status: </b> '.$results[$i]['_source']['status'].'</p>
       ';
      if($results[$i]['_source']['CPU']=="")
      {
        echo '<br><p class="snippet" id="model_details"><b>CPU: </b>No information available
      
        </div>  
      </div></li>';
      }else
      {
        echo '<br><p class="snippet" id="model_details"><b>CPU: </b>'.$results[$i]['_source']['CPU'].'
      
        </div>  
      </div></li>';
      }
  }
  echo "</ul><div style='text-align:center;'><b><h5>Pagination options</h5></b></div><div id='pag'><ul class='pagination'></ul></div></div></div>";
  $arr = explode(" ",$query);
  foreach ($arr as $val)
 {
  echo "<script>$('.list').highlight('".$val."');</script>";
 }
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
               'fields'=> ['brand','model','display_resolution','RAM','OS','display_type','internal_memory','loud_speaker','audio_jack','CPU']
              ]
          ]
      ]
  ]; 
  $response = $client->search($params);
  $results_count = sizeof($response['hits']['hits'],0);
  $_SESSION['num_results'] = $results_count;
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
  echo "<div id='listId'><div class='cards' style='margin-bottom:6%;'>";
 echo "<ul class='list' style='list-style:none;'>";
  for ($i=0; $i<$results_count; $i++)
  {
     echo '
       <li><div class="p-3">
       <img style="margin-top:-6%;" src="'.$results[$i]['_source']['img_url'].'" alt="Smiley face" width="100" height="100">
       <div style="display:inline-block;" id="content">';
     
       echo '<h4><a href="http://localhost/info_page.php?disp_id='.$results[$i]['_id'].'" id="brand">'.$results[$i]['_source']['brand'].' '.$results[$i]['_source']['model'].'</a></h4>
      <br>
       <p class="snippet" id="model_details"><b>Announced</b> in: '.$results[$i]['_source']['announced'].'. <b>Current Status: </b> '.$results[$i]['_source']['status'].'</p>';

       if($results[$i]['_source']['CPU']=="")
      {
        echo '<br><p class="snippet" id="model_details"><b>CPU: </b>No information available
      
        </div>  
      </div></li>';
      }else
      {
        echo '<br><p class="snippet" id="model_details"><b>CPU: </b>'.$results[$i]['_source']['CPU'].'
      
        </div>  
      </div></li>';
      }
      
  }
  echo "</ul><div style='text-align:center;'><b><h5>Pagination options</h5></b></div><div id='pag'><ul class='pagination'></ul></div></div></div>";
  $arr = explode(" ",$query);
  foreach ($arr as $val)
 {
  echo "<script>$('.list').highlight('".$val."');</script>";
 }
 }
?>
</div>
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>


</body>
</html>
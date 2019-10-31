<?php
require_once("./navbar.php");
require_once("./connect_db.php");
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $announced = $_POST['announced'];
    $colour = $_POST['colour'];
    $url = $_POST['url'];
    $battery = $_POST['battery'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $cam_res = $_POST['cam_res'];
    $mem = $_POST['mem'];
    $ram = $_POST['ram'];
    $bluetooth = $_POST['bluetooth'];
    $processor = $_POST['processor'];
    $sim = $_POST['sim'];
    $gps = $_POST['gps'];
    $cores = $_POST['cores'];
    $status = $_POST['status'];
    $disp_tech = $_POST['disp_tech'];

    use Elasticsearch\ClientBuilder;
    require './vendor/autoload.php';
    $hosts = ['http://localhost:9200'];
    $client = ClientBuilder::create()->setHosts($hosts)->build();
    $params = [
        'index' => 'mobile',
        'body' => [
            "sort" => [
                "_id"=>[
                    "order" => "desc",
                    "mode" => "max"
                ]
            ]
            
        ]
    ]; 
    $response = $client->search($params);
    $sucess = $response['_shards']['successful'];
    $fail =  $response['_shards']['failed'];
    $next_index = $response['hits']['total']['value'];
    $params = [
        'index' => 'mobile',
        'id' => $next_index,
        'body' => ['brand'=>$brand,'model'=>$model,'announced'=>$announced,'colour'=>$colour,'img_url'=>$url,'battery'=>$battery,'approx_price_EUR'=>$price,'display_resolution'=>$size,'primary_camera'=>$cam_res,'internal_memory'=>$mem,'RAM'=>$ram,'bluetooth'=>$bluetooth,'Chipset'=>$processor,'SIM'=>$sim,'GPS'=>$gps,'CPU'=>$cores,'status'=>$status,'display_type'=>$disp_tech]
    ];
    $response = $client->index($params);
    if($sucess == 1)
    {
       
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
		echo "<script>swal('Thank you for your contribution', 'Your new entry was successful', 'success').then(function(){
			window.location.href='index.php';
		});</script>";
    }
    else if($fail == 0)
    {
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
		echo "<script>swal('Thank you for your attempt to contribution', 'Your new entry was unsuccessful', 'error').then(function(){
			window.location.href='index.php';
		});</script>";
    }
?>
<html>
    <head>
        <title>Post response</title>
</head>
<link rel="stylesheet" href="./css/register.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body id="particles-js">

<!-- Copyright -->
<!-- Copyright -->
<footer class="text-center copyright fixed-bottom">&copy;2019 Copyright: BestSearch - pgala001@odu.edu
</footer>
<!-- Copyright -->
<!-- Copyright -->
<!--container end.//-->
</body>
<script src="./js/particles.js"></script>
<script src="./js/app.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>
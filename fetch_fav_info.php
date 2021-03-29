<?php
 require './vendor/autoload.php';
 use Elasticsearch\ClientBuilder;
 $hosts = ['http://localhost:9200'];
 $doc_id = $_POST['doc_id'];
 $client = ClientBuilder::create()->setHosts($hosts)->build();
 $params = [
     'index' => 'mobile',
     'body' => [
      'from' => 0,
      'size' => 10000,
         'query' => [
             'match'=>[
                '_id'=> $doc_id
             ]
         ]
     ]
 ]; 
 $response = $client->search($params);
 $results = $response['hits']['hits'];
 $info = $results[0]['_source']['OS'].PHP_EOL.$results[0]['_source']['Chipset'].PHP_EOL.$results[0]['_source']['CPU'].PHP_EOL;
 echo $info;
?>
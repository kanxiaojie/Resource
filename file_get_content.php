<?php
//$opts = array(
//　　'http'=>array(
//　　　　'method'=>"GET",
//　　　 'timeout'=>10,
//　 )
//);
$opts = array(
    'http' => array(
        'method' => 'GET',
        'timeout' => 10
    )
);
$context = stream_context_create($opts);
$html =file_get_contents('http://www.example.com', false, $context);
echo $html;
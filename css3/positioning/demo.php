<?php

$postArray ='[{"data":{"hello":"world"},"type":"1234","date":"2012-10-30 17:6:9","user":"000000000000000","time_stamp":1351587969902}, {"data":{"hello":"world"},"type":"1234","date":"2012-10-30 17:12:53","user":"000000000000000","time_stamp":1351588373519}]';


$de_json = json_decode($postArray,TRUE);
$count_json = count($de_json);
for ($i = 0; $i < $count_json; $i++)
{
    //echo var_dump($de_json);

    $dt_record = $de_json[$i]['date'];
    $data_type = $de_json[$i]['type'];
    $imei = $de_json[$i]['user'];
print_r($dt_record);
}
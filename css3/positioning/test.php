<?php
$endTime = date("Y-m-d H:i:s");
$startTime = date("Y-m-d H:i:s",strtotime('-10 day'));

$token = md5('elearning'.date('YmdH'));

print_r($token);

<?php
//$startTime = 'elearning'.date('YmdH');
//$start = date('Y-m-d H:i:s');
//$endTime = date("Y-m-d H:i:s",strtotime('-3 day'));

//$url = "http://api.github.com";
//$html = file_get_contents($url);
//$html = md5('elearning2016071819');
echo md5('elearning'.date('YmdH'));
echo '<br/>';
echo date('YmdH');

<?php

$opt = array('location' => 'http://localhost/SOAP-server.php', 'uri' => 'http://localhost');
$api = new SoapClient(NULL, $opt);

echo ("----Fungsi HelloWorld----");
echo "<br>";
echo $api -> helloworld();
echo "<br><br>";
echo ("----Fungsi Addition----");
echo "<br>";
echo $api -> addition(5,5);
echo "<br><br>";
echo ("----Fungsi GetData----");
echo "<br>";
echo $api -> getData();
?>
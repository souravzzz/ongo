<?php
define(URL, 'http://tour.golang.org/compile');

if(isset($argv[1])) {
    $srcFileName = $argv[1];
} else {
    die('Please enter source file to compile.');
}

$srcFile = fopen($srcFileName, 'r') or die ("Source file $srcFileName could not be read.");
$srcCode = file_get_contents($srcFileName) or die ("Source file $srcFileName could not be read.");
$postDataPrefix = 'version=2&body=';
$postData = $postDataPrefix.urlencode($srcCode);
$headers = array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8','Accept: application/json, text/javascript, */*; q=0.01');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
#curl_setopt($ch, CURLOPT_VERBOSE, 1); 

$result = curl_exec($ch);
if(!curl_errno($ch)) {
    $info = curl_getinfo($ch);
    echo $result;
}

?>

<?php

require_once('handleResponse.inc.php');

$shortopts = "v:f:u:dh";
$longopts = array("version:","filename:","url:","debug","help");
$options = getopt($shortopts, $longopts);

$url = 'http://tour.golang.org/compile';
$version = 1;
$debug = false;
$helpMessage = "\tphp go.php <filename.go>\n\tphp go.php [-v1/2] [-d] [-h] -f <filename.go> \n";

foreach($options as $key => $val) {
    if($key == 'v') {
        $version = $val;
    } else if($key == 'f') {
        $srcFileName = $val;         
    } else if($key == 'd') {
        $debug = true;
    } else if($key == 'd') {
        $url = $val;         
    } else if($key == 'h') {
        print $helpMessage;
        exit(0);
    }
}

if($argc == 2 && isset($argv[1])) {
    $srcFileName = $argv[1];
}

if($srcFileName == '') {
    die('Please enter source file to compile.');
}

if($url == '') {
    die('Please enter url to contact. If you are not sure, remove -u option.');
}

$srcFile = fopen($srcFileName, 'r') or die ("Source file $srcFileName could not be read.");
$srcCode = file_get_contents($srcFileName) or die ("Source file $srcFileName could not be read.");
$postDataPrefix = "version=$version&body=";
$postData = $postDataPrefix.urlencode($srcCode);
$headers = array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8','Accept: application/json, text/javascript, */*; q=0.01');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_VERBOSE, $debug); 

$result = curl_exec($ch);
if(!curl_errno($ch)) {
    $info = curl_getinfo($ch);
    $http_code = $info['http_code'];
    if(200 == $http_code) {
        if($debug) print "\nServer response: $result\n";
    } else {
        die ("An error occurred, server returned $http_code");
    }
} else {
    die ("An error ocurred, curl returned".curl_errno($ch));
}
curl_close($ch);

handleResponse($result, $version, $debug);

?>

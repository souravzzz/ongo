<?php

function handleResponse($respStr, $version, $debug) {
    $respObj = json_decode($respStr, 1) or die ('Could not parse data from server.');
    if($debug) var_dump($respObj);
    if($version == 1) {
        $error = $respObj["compile_errors"];
        if($error != '')  print "\nERRORS:\n$error";
        $output = $respObj["output"];
        if($output != '') print "\nOUTPUT:\n$output\n";
    } else if($version == 2) {
        $error = $respObj["Errors"]; 
        if($error != '')  print "\nERRORS:\n$error";
        $events = $respObj["Events"];
        foreach($events as $index => $event) {
            $message = $event["Message"];
            $delay = $event["Delay"];
            usleep($delay/1000);
            print $message;
        }
    }
}

?>

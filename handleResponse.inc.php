<?php

function handleResponse($respStr, $version) {
    $respObj = json_decode($respStr, 1) or die ('Could not parse data from server.');
    if($version == 1) {
        $error = $respObj["compile_errors"];
        $output = $respObj["output"];
        if($error != '')  print "\nERRORS:\n$error";
        if($output != '') print "\nOUTPUT:\n$output\n";
    } else if($version == 2) {
        var_dump($respObj);
    }
}

?>

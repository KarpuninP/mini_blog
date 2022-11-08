<?php

// Debug function (like var_dump();)
use JetBrains\PhpStorm\NoReturn;

function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

// redirect function
#[NoReturn]
function redirect($http = false) {
    if($http) {
        // if we have some address, then we will redirect to it
        $redirect = $http;
    }else {
        // if nothing is passed, then you need to update page f5 to where it came from
        // if the server is in the array (the address it came from), if not, then go to the main page
        $redirect = $_SERVER['HTTP_REFERER'] ?? PATH;
    }
    // And send us to the page that turned out above
    header("Location: $redirect");
    exit;
}



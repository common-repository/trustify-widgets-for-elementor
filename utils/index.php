<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


function trfy_apiUrl(){
    return "https://api.trustify.ch/";
}


function trfy_dateFormat($timestamp){
    // Create DateTime objects
    $createdAt = new DateTime($timestamp);
    $now = new DateTime();

    // Calculate the difference
    $interval = $now->diff($createdAt);

    // Choose the largest unit
    if ($interval->y > 0) {
        $output = $interval->y . " year" . ($interval->y > 1 ? "s" : "");
    } elseif ($interval->m > 0) {
        $output = $interval->m . " month" . ($interval->m > 1 ? "s" : "");
    } elseif ($interval->d > 0) {
        $output = $interval->d . " day" . ($interval->d > 1 ? "s" : "");
    } elseif ($interval->h > 0) {
        $output = $interval->h . " hour" . ($interval->h > 1 ? "s" : "");
    } elseif ($interval->i > 0) {
        $output = $interval->i . " minute" . ($interval->i > 1 ? "s" : "");
    } else {
        $output = $interval->s . " second" . ($interval->s > 1 ? "s" : "");
    }

    return $output;
}

?>
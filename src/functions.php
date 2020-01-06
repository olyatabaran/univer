<?php

function getSeconds($value)
{
    $currentDate = date('Y-m-d H:i:s');
    $currentDateStamp = strtotime($currentDate);
    $t = strtotime($value);
    $seconds = $currentDateStamp - $t;
    if ($seconds > 31556926) {
        return intval($seconds / 31556926) . " years ago";
    } elseif ($seconds > 2592000) {
        return intval($seconds / 2592000) . " months ago ";
    }elseif ($seconds > 604800) {
        return intval($seconds / 604800) . " weeks ago ";
    }elseif ($seconds > 86400) {
        return intval($seconds / 86400) . " days ago ";
    }elseif ($seconds > 3600) {
        return intval($seconds / 3600) . " ours ago ";
    }elseif ($seconds > 60) {
        return intval($seconds / 60) . " minutes ago ";
    }elseif ($seconds < 60) {
        return $seconds. " minutes ago ";
    }
}
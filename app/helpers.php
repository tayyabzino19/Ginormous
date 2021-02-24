<?php

function daysDiff($from_date, $to_date){
    $from_date = new DateTime($from_date);
    $to_date = new DateTime($to_date);
    $interval = $from_date->diff($to_date);
    $days = $interval->format('%d');
    $days = $days + 1;
    return $days;
}

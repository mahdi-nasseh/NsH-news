<?php
use Carbon\Carbon;
include 'jdf.php';
function toJalali($date){
//    $date = Carbon::parse($date1)->format('Y-m-d');
    $date = strtotime($date);
    return $date =  jdate('j',$date) . ' ' . jdate('F',$date) . '، ' . jdate('o',$date);
}

function getYear($date){
    $date = strtotime($date);
    return jdate('o',$date);
}

function getMonth($date){
    $date = strtotime($date);
    return jdate('F',$date);
}

function getDay($date){
    $date = strtotime($date);
    return jdate('d',$date);
}
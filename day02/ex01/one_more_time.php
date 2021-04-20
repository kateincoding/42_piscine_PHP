#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$week = array(
    1 => "lundi",
    2 => "mardi",
    3 => "mercredi",
    4 => "jeudi",
    5 => "vendredi",
    6 => "samedi",
    7 => "dimanche");
$month = array(
    1 => "janvier",
    2 => "février",
    3 => "mars",
    4 => "avril",
    5 => "mai",
    6 => "juin",
    7 => "juillet",
    8 => "août",
    9 => "septembre",
    10 => "octobre",
    11 => "novembre",
    12 => "décembre");
if ($argc >= 2) {
    $input_date = explode(" ", $argv[1]);
    if(count($input_date) != 5)
    {
        print("Wrong Format\n");
            exit(0);
    }
    $input_date[0] = array_search(lcfirst($input_date[0]), $week);
    $input_date[2] = array_search(lcfirst($input_date[2]), $month);
    if ($input_date[0] === false || $input_date[2] === false)
    {
        echo "Wrong Format\n";
        exit();
    }
    if(preg_match("/^[1-9]$|0[1-9]|[1-2][0-9]|3[0-1]$/", $input_date[1], $input_date[1]) === 0 || 
    preg_match("/^[0-9]{4}$/", $input_date[3], $input_date[3]) === 0 ||
    preg_match("/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $input_date[4], $input_date[4]) === 0)
    {
        echo "Wrong Format\n";
        exit();
    }
    $time = mktime($input_date[4][1], $input_date[4][2], $input_date[4][3], $input_date[2], $input_date[1][0], $input_date[3][0]);
    if (date("N", $time) == $input_date[0])
        echo $time ."\n";
    else
        echo "Wrong Format\n";
}
else
{
    echo "Wrong Format\n";
    exit();
}
?>
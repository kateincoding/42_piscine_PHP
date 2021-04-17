#!/usr/bin/php
<?php
if ($argc > 1)
{
    $string = trim($argv[1]);
    $string = preg_replace('/\s+/', ' ', $string);
    $arr = explode(" ", $string);
    $first = array_shift($arr);
    $string = implode(" ", $arr);
	if ($string)
    	echo $string." ";
    echo $first."\n";
}
?>
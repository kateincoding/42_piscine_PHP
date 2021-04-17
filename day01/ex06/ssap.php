#!/usr/bin/php
<?php
if ($argc > 1)
{
    $input = array();
    $input = implode(" ", $input);
    $input = trim(preg_replace('/\s+/', ' ', $input));
    $input = explode(" ", $input);
    sort($input);
    foreach ($input as $output) 
    {
        echo "$output" . "\n";
    }
}
?>
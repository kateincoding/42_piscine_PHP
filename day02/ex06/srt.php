#!/usr/bin/php
<?php
if ($argc < 2 || !file_exists($argv[1]))
    exit(1);

$file_content = file_get_contents($argv[1]);

$lines = explode("\n\n", $file_content);

$hours = [];

foreach ($lines as $line)
{
    $line = explode("\n", $line);
    $hour = $line[1];
    $hour = substr($hour, 0, 12);
    $hours[$hour] = [
        'hour' => $line[1],
        'sentence' => $line[2]
    ];
}
ksort($hours);
$number = 1;
$count = count($hours);

foreach ($hours as $hour => $data)
{
    echo $number++;
    echo "\n";
    echo $data['hour'];
    echo "\n";
    echo $data['sentence'];
    echo "\n";
    if ($number - 1 < $count)
        echo "\n";
}
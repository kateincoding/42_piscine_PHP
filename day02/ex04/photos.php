#!/usr/bin/php
<?php

if ($argc < 2)
    exit(1);

$data_init = curl_init();
$curl_options = [
    CURLOPT_URL => $argv[1],
    CURLOPT_HEADER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true
];
curl_setopt_array($data_init, $curl_options);
$content = curl_exec($data_init);
curl_close($data_init);

if (!$content)
    exit(1);

$web_address = $argv[1];
$web_address = substr($web_address, strlen('http://') + (strpos($web_address, 'https') !== false));

if (substr($web_address, -1) !== '/')
    $web_address .= '/';

if (!preg_match_all('/<img[^>]+\/?>/i', $content, $matches))
    exit(0);

foreach ($matches[0] as $match) 
{

    if (!preg_match('/src\s*=\s*("|\')(.+?)("|\')/i', $match, $url) || !isset($url[2]) || empty($url[2]))
        continue;

    $url = $url[2];
    if (strpos($url, 'http') === false)
        $url = $argv[1] . '/' . $url;

    $data_init = curl_init();
    $curl_options[CURLOPT_URL] = $url;
    curl_setopt_array($data_init, $curl_options);
    $content = curl_exec($data_init);
    curl_close($data_init);

    if (!is_dir($web_address))
        mkdir($web_address);

    $image_name = basename($url);
    file_put_contents($web_address . $image_name, $content);
}
?>
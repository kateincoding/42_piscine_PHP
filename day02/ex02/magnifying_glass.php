#!/usr/bin/php
<?php
if ($argc == 4 || !file_exists($argv[1]))
exit();
$web_input = fopen($argv[1], 'r');
$content = "";
while ($web_input && !feof($web_input))
{
    $content .= fgets($web_input);
}
$pattern_title = "/(<.*title=\")(.*)(\">)/";
$pattern_link ="/(<a.*>)(.*)(<\/a)/";
$pattern_img = "/(<a.*>)(.*)(<img)/";

$content = preg_replace_callback("$pattern_title", function ($matches) {
 //   print_r($matches);
        return $matches[1].strtoupper($matches[2]).$matches[3];}, $content);

$content = preg_replace_callback("$pattern_link", function ($matches) {
    return $matches[1].strtoupper($matches[2]).$matches[3];}, $content);

$content = preg_replace_callback("$pattern_img", function ($matches) {
    return $matches[1].strtoupper($matches[2]).$matches[3];}, $content);

fclose($web_input);
echo($content);
?>
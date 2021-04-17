#!/usr/bin/php
<?php
    function ft_split($string)
    {
        $string = trim(preg_replace("/ {2,}/"," ", $string));
        $word = explode(" ", $string);
        sort($word);
        return ($word);
    }
?>
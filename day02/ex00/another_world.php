#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$string = trim(preg_replace('/\s+/', ' ', $argv[1]));
		if ($string)
			echo "$string"."\n";
	}
?>
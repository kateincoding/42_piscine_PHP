#!/usr/bin/php
<?php
	$stdin = fopen("php://stdin", "r");
	while ($stdin && !feof($stdin))
	{
		echo "Enter a number: ";
		$input = trim(fgets($stdin));
		if ($input)
		{
			$input = str_replace("\n", "", "$input");
			if (is_numeric($input))
			{
				if ($input % 2 == 0)
					echo "The number " . $input . " is even\n";
				else
					echo "The number " . $input . " is odd\n";
			} else
				echo "'" . $input . "' is not a number\n";
		}
	}
	fclose($stdin);
	echo "\n";
?>
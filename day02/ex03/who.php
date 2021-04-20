#!/usr/bin/env php
<?php
    date_default_timezone_set('America/Los_Angeles');
	$data_file = fopen("/var/run/utmpx", "rb");
	fseek($data_file, 1256);
	while (!feof($data_file))
	{
        $user_dat = fread($data_file, 628);
        
		if (strlen($user_dat) == 628)
		{
			$user_dat = unpack("a256user/a4id/a32line/ipid/itype/itime", $user_dat);
			if ($user_dat['type'] == 7)
			{
                echo trim($user_dat['user']);
                echo "    ";

                echo trim($user_dat['line']);
                $time_hour = date("M d H:i", $user_dat['time']);
                echo "  ";

				echo $time_hour . " \n";
			}
		}
	}
?>
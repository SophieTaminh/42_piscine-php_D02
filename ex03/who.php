#!/usr/bin/php/
<?php

date_default_timezone_set('Europe/Paris');

$fp = fopen("/var/run/utmpx", "r") or die("Impossible de lire la ligne de commande");

while($ligne = fread($fp,628)) //lecture de la ligne qui est en 
	//on range dans un tableau 
	//https://github.com/libyal/dtformats/blob/master/documentation/Utmp%20login%20records%20format.asciidoc#32-record
{
	$unpack = unpack("a256user/a4id/a32line/ipid/itype/Ltime",$ligne);
	if ($unpack[type] == 8 or $unpack[pid] == 145)
	{			
		echo $unpack[user]."  ".$unpack[line]."  ".date("D d h:s",$unpack[time]).PHP_EOL;
	}		
}
fclose($fp);

#!/usr/bin/php
<?php
if ($argc < 2 || !file_exists($argv[1]))
	exit ;

$fp = fopen($argv[1], "r") or die("Impossible de lire la ligne de commande");
while (!feof($fp))
{
	$page = fgets($fp);
	$page = preg_replace_callback("/(<a )(.*?)(>)(.*)(<\/a>)/s", function($matches)
	{
		$matches[0] = preg_replace_callback("/( title=\")(.*?)(\")/m", function($matches)
		{
			return ($matches[1].strtoupper($matches[2]).$matches[3]);
		}, $matches[0]);
		$matches[0] = preg_replace_callback("/(>)(.*?)(<)/m", function($matches)
		{
			return ($matches[1].strtoupper($matches[2]).$matches[3]);
		}, $matches[0]);
		return ($matches[0]);
	},
		$page);
	echo $page;
}
fclose($fp);
?>
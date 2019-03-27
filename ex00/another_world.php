#!/usr/bin/php
<?PHP

$liste = $argv[1];

$liste=preg_replace ('/\t\t+/' ,' ' ,$liste);	//remplace les tab par un espace
$liste=preg_replace ('/\s\s+/' ,' ' ,$liste);	//remplace les espaces par un espace

$liste=trim($liste, "\t");				//supprime les tab en debut et fin de chaine
$liste=trim($liste);				//supprime les espaces en debut et fin de chaine

if ($liste)
echo "$liste"."\n";

?>
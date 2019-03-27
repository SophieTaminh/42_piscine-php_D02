#!/usr/bin/php
<?PHP

$date=explode(' ', $argv[1]); 		// cree un tableau

//test libelle jour
$jour=preg_match('/Lundi|lundi|Mardi|mardi|Mercredi|mercredi|Jeudi|jeudi|Vendredi|vendredi|Samedi|samedi|Dimanche|dimanche/', $date[0]);

$jourlib = array();
$jourlib[0]='/Lundi|lundi/';
$jourlib[1]='/Mardi|mardi/';
$jourlib[2]='/Mercredi|mercredi/';
$jourlib[3]='/Jeudi|jeudi/';
$jourlib[4]='/Vendredi|vendredi/';
$jourlib[5]='/Samedi|samedi/';
$jourlib[6]='/Dimanche|dimanche/';
$jourcode = array();
$jourcode[0] = '1';
$jourcode[1] = '2';
$jourcode[2] = '3';
$jourcode[3] = '4';
$jourcode[4] = '5';
$jourcode[5] = '6';
$jourcode[6] = '7';
$jour=preg_replace($jourlib, $jourcode, $date[0]);

if($jour == date[0])
{
	echo "Wrong Format"."\n";
	Exit;
}

//test numerique jour
if(is_numeric($date[1]))
{
	if($date[1] > 31 || $date[1] < 1)
	{
		echo "Wrong Format"."\n";
		Exit;
	}
	$journb=$date[1];
}
else
{
	echo "Wrong Format"."\n";
	Exit;
}

$moislib = array();
$moislib[0]='/janvier|Janvier/';
$moislib[1]='/fevrier|Fevrier|février|Février/';
$moislib[2]='/mars|Mars/';
$moislib[3]='/avril|Avril/';
$moislib[4]='/mai|Mai/';
$moislib[5]='/juin|Juin/';
$moislib[6]='/juillet|Juillet/';
$moislib[7]='/aout|août|Aout|Août/';
$moislib[8]='/septembre|Septembre/';
$moislib[9]='/octobre|Octobre/';
$moislib[10]='/novembre|Novembre/';
$moislib[11]='/decembre|décembre|Decembre|Décembre/';
$moisnb = array();
$moisnb[0]='01';
$moisnb[1]='02';
$moisnb[3]='03';
$moisnb[4]='04';
$moisnb[5]='05';
$moisnb[6]='06';
$moisnb[7]='07';
$moisnb[8]='08';
$moisnb[9]='09';
$moisnb[10]='10';
$moisnb[11]='11';
$moisnb[12]='12';
$mois=preg_replace($moislib, $moisnb, $date[2]);

if($mois == $date[2])
{
	echo "Wrong Format"."\n";
	Exit;
}

// test annee
if(is_numeric($date[3]))
{
	if($date[3] > 9999 || $date[3] < 1970)
	{
		echo "Wrong Format"."\n";
		Exit;
	}
	$annee=$date[3];
}
else
{
	echo "Wrong Format"."\n";
	Exit;
}

//test heure
$time=preg_match('/^([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])$/', $date[4]);

if($time == 0)
{
	echo "Wrong Format"."\n";
	Exit;
}

$time=explode(':', $date[4]); 		// cree un tableau

//mktime h, m, s, m numero de mois, d numero du jour, y annee
date_default_timezone_set('Europe/Paris');
$mktime=mktime($time[0],$time[1],$time[2],$mois,$journb,$annee);

//verification du jour
$codejourok=date("N",$mktime);

if($jour != $codejourok)
{
	echo "Wrong Format"."\n";
	Exit;
}

echo "$mktime"."\n";

?>

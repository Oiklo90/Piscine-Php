#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Paris");
if ($argc < 2)
	exit();
$argv[1] = trim($argv[1]);
$tab = array($argv[1]);
$date = preg_grep("/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([3][0-1]?|[12][0-9]?|[4-9]|[0][1-9]) ([Nn]ovembre|[Ss]eptembre|[Oo]ctobre|[dD]ecembre|[jJ]anvier|[fF]evrier|[mM]ars|[aA]vril|[mM]ai|[jJ]uin|[jJ]uillet|[aA]out) ([2-9][0-9]{3}|19[7-9][0-9]) ([0-1][0-9]|[2][0-3]):[0-5][0-9]:[0-5][0-9]$/", $tab);
if (!$date) {
	echo "Wrong Format\n";
	exit();
}
$month = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
$day = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
$tab = explode(" ", $tab[0]);
$tab[0] = lcfirst($tab[0]);
$tab[2] = lcfirst($tab[2]);
$i = 1;
foreach ($month as $elem) {
	if ($elem === $tab[2])
		$tab[2] = $i;
	$i++;
}
$i = 1;
foreach ($day as $elem) {
	if ($elem === $tab[0])
		$tab[0] = $i;
	$i++;
}
$tab[4] = explode(":", $tab[4]);
$time = mktime($tab[4][0], $tab[4][1], $tab[4][2], $tab[2], $tab[1], $tab[3]);
if (date( "N", $time) == $tab[0])
	echo "$time\n";
else
	echo "Wrong Format\n";
?>

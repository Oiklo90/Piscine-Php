#!/usr/bin/php
<?php

if ($argc > 1)
{
	$tab = explode(' ', $argv[1]);
	$tab = array_filter($tab);
	$str = $tab[0];
	array_push($tab, $str);
	unset($tab[0]);
	$str = implode(' ', $tab);
	echo $str."\n";
}

?>

#!/usr/bin/php
<?php

function ft_split($str)
{
	$tab = explode(' ', $str);
	$tab = array_filter($tab);
	if ($str != NULL)
		sort($tab);
	return ($tab);
}

if ($argc > 1) {
$tab = array();
foreach ($argv as $arg) {
	if ($arg != $argv[0]) {
		$new = ft_split($arg);
		$tab = array_merge($tab, $new);
	}
}
$numeric = array();
$ascii = array();
$alpha = array();
foreach ($tab as $elem) {
	if (is_numeric($elem))
		array_push($numeric, $elem);
	else if (ctype_alpha($elem))
		array_push($alpha, $elem);
	else
		array_push($ascii, $elem);
}
sort($numeric, SORT_STRING);
sort($alpha, SORT_NATURAL | SORT_FLAG_CASE);
sort($ascii);
foreach ($alpha as $elem)
	echo $elem."\n";
foreach ($numeric as $elem)
	echo $elem."\n";
foreach ($ascii as $elem)
	echo $elem."\n";
}

?>

#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$tab = explode(' ', $str);
	$tab = array_filter($tab);
	if ($str != NULL)
		sort($tab);
	return ($tab);
}

?>

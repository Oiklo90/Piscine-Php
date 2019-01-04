#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	$argv[1] = str_replace(array("\t", "\v", "\r"), ' ', $argv[1]);
	while(strpos($argv[1], '  ') != false)
		$argv[1] = str_replace('  ', ' ', $argv[1]);
	print "$argv[1]\n";
}
?>

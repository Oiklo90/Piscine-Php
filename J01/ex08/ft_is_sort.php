#!/usr/bin/php
<?php

function ft_is_sort($tab) {
	$tab2 = $tab;
	sort($tab2);
	if ($tab == $tab2)
		return (1);
	else
		return (0);
}

?>

<?php
include "auth.php";
$login = $_GET['login'];
$passwd = $_GET['passwd'];
session_start();
if ($login !== NULL && $passwd !== NULL) {
	if (auth($login, $passwd) !== FALSE) {
		$_SESSION['loggued_on_user'] = $login;
		echo "OK\n";
	}
	else {
		$_SESSION['loggued_on_user'] = NULL;
		echo "ERROR\n";
	}
}
else {
	$_SESSION['loggued_on_user'] = NULL;
	echo "ERROR\n";
}
?>

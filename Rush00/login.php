<?php
include "auth.php";
$login = $_POST['login'];
$passwd = $_POST['passwd'];
session_start();
echo $login." ".$passwd."\n";
if (!($login && $passwd && auth($login, $passwd))) {
	$_SESSION['loggued_on_user'] = NULL;
	echo "ERROR\n";
	header('Location: index.php');
}
else {
	$_SESSION['loggued_on_user'] = $login;
	header('Location: index.php');
    }
?>

<?php
include "auth.php";
$login = $_POST['login'];
$passwd = $_POST['passwd'];
session_start();
if (!($login && $passwd && auth($login, $passwd))) {
	$_SESSION['loggued_on_user'] = NULL;
	echo "ERROR\n";
	header('Location: index.html');
}
else {
	$_SESSION['loggued_on_user'] = $login;
	echo '<iframe name="chat" src="chat.php" width="100%" height="550px">
		</iframe><iframe src="speak.php" width="100%" height="50px"></iframe>';
    }
?>

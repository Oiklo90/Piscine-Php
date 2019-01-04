<?php
date_default_timezone_set("Europe/Paris");
session_start();

if (!($_SESSION['loggued_on_user']))
	echo "ERROR\n";
else {
	if (file_exists('../private') && file_exists('../private/chat')) {
		$fd = fopen("../private/chat", "r");
		flock($fd, LOCK_SH);
		$chat = unserialize(file_get_contents('../private/chat'));
		foreach ($chat as $v) {
			echo "[" . date('H:i', $v['time']) . "] <b>" . $v['login'] . "</b>: " . $v['msg'] . "<br />";
		flock($fd, LOCK_UN);
		fclose($fd);
		}
	}
}
?>

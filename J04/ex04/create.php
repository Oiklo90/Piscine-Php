<?php
session_start();
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK") {
	mkdir("../private");
	$content = unserialize(file_get_contents("../private/passwd"));
	if ($content) {
		foreach ($content as $k => $v) {
			if ($v['login'] === $_POST['login']) {
				exit ("ERROR\n");
			}
		}
	}
	$tmp['login'] = $_POST['login'];
	$tmp['passwd'] = hash("whirlpool", $_POST['passwd']);
	$content[] = $tmp;
	file_put_contents('../private/passwd', serialize($content));
	echo "OK\n";
	header("Location: index.html");

}
else {
	echo "ERROR\n";
}


?>

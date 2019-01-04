<?php
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
	$account[] = $tmp;
	file_put_contents('../private/passwd', serialize($account));
	echo "OK\n";

}
else {
	echo "ERROR\n";
}


?>

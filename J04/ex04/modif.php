<?php
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === "OK" && file_exists("../private/passwd")) {
	$content = unserialize(file_get_contents("../private/passwd"));
	if ($content) {
		foreach ($content as $k => $v) {
			if ($v['login'] === $_POST['login'] && hash("whirlpool", $_POST['oldpw']) === $v['passwd']) {
				$tmp['login'] = $_POST['login'];
				$tmp['passwd'] = hash("whirlpool", $_POST['newpw']);
				$account[] = $tmp;
				file_put_contents('../private/passwd', serialize($account));
				echo "OK\n";
				header("Location: index.html");
			}
		}
	}
	else
		echo "ERROR\n";
}
else {
	echo "ERROR\n";
}
?>

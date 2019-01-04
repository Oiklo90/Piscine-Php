<?php
function auth($login, $passwd) {
	$content = unserialize(file_get_contents("../private/passwd"));
	if ($content) {
		foreach ($content as $k => $v) {
			if ($v['login'] === $login && hash("whirlpool", $passwd) === $v['passwd'])
				return (TRUE);
		}
	}
	return (FALSE);
}
?>

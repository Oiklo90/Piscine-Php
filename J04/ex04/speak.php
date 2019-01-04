<?php
date_default_timezone_set("Europe/Paris");
session_start();
if (!($_SESSION['loggued_on_user']))
	echo "ERROR\n";
else {
	if ($_POST['msg']) {
		if (!file_exists('../private')) {
			mkdir("../private");
		}
		if (!file_exists('../private/chat')) {
			file_put_contents('../private/chat', null);
		}
		$chat = unserialize(file_get_contents('../private/chat'));
		$fp = fopen('../private/chat', "w");
		flock($fp, LOCK_EX);
		$tmp['login'] = $_SESSION['loggued_on_user'];
		$tmp['time'] = time();
		$tmp['msg'] = $_POST['msg'];
		$chat[] = $tmp;
		file_put_contents('../private/chat', serialize($chat));
		fclose($fp);
	}
	?>
<html>
	<head>
	<title>Chat</title>
	<style ="text/css">
		.button {
			margin-left: 8%;
			position: absolute;
			margin-top: 10px;
		}
		.txt {
			overflow: auto;
			resize: none;
			outline: none;
			height: 100%;
			width: 80%
		}
	</style>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form action="speak.php" method="POST">
			<input class="txt" placeholder="Message" name="msg" value=""/>
			<input class="button" type="submit"  name="submit" value="Envoyez"/>
		</form>
	</body>
</html>
	<?php
}
?>

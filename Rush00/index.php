<?php
session_start();
?>
<html>
<head>
	<meta charset="UTF-8" />
	<title>42Joke</title>
	<link rel="stylesheet" href="Style/index.css" />
</head>
<body>
	<header>
		<nav role="naviguation" id="test">
			<div id="nav">
				<?php
				if ($_SESSION['loggued_on_user'] === NULL){?>
				<a href="connexion.html">Sign in</a>
				<a href="create.html">Sign up</a>
				<?php }
				else{?>
				<ul id ="menu">
            	<li><a href="#"><?php echo $_SESSION['loggued_on_user'];?></a>
                <ul class="ulul">
                    <li class="sub"><a href="http://www.oetker.fr/fr-fr/nos-produits/les-sticks-et-bretzels/apercu.html">Profile</a></li>
                    <li class="sub"><a href="http://www.justinbridou.fr/">Settings</a></li>
                    <li class="sub"><a href="logout.php">Log out</a></li>
                </ul>
           		</li>
				<?php }?>
			</div>
		</nav>
	</header>
</body>
</html>

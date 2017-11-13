<?php if(isset($_COOKIE["session"])){
	setcookie("session","");
	header("location: index.php");
} else {
	echo"Error: No hay usuarios conectados.</p>";
} ?>
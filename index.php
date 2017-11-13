<?php
if(isset($_COOKIE["session"])){
	header("Location: dashboard.php");
} else {
	header("Location: login.php");
}
?>
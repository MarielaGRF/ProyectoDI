<?php
    $db_host = "localhost";	// Host de la BD
    $db_user = "root";		// Usuario de la BD
    $db_pass = "5a77851f6274c1c276ddc27bf27ab7d9d191eeaf3055a914";		// Contrasenia de la BD
    $db_name = "ProyectoID"; //Nombre de la BD

	//Mi sistema no trabaja bajo la version 5, se recomienda 5.2 a 5.4
	if (version_compare(PHP_VERSION, '5.0.0', '<')) {
		//echo 'Estoy usando la version 4 de PHP, mi version: ' . PHP_VERSION . "\n";
		header("location: error-pages.php?no=php_version");
	}

    //Conectamos y seleccionamos DB
    $connect =    mysqli_connect($db_host, $db_user, $db_pass);
    $mysql_connect_db	=    mysqli_select_db($connect,$db_name);
    if(!$connect || !$mysql_connect_db){
		if(isset($_GET["no"]) && $_GET["no"]=="mysql_error"){ } else {
			header("location: error-pages.php?no=mysql_error");
		}
    }

	//Nos retornara cualquier dato de la sesion de un administrador
	if(isset($_COOKIE["session"])){
		$uinfo=mysqli_query($connect ,"SELECT * FROM empleado WHERE session='".$_COOKIE["session"]."'");
		$user = mysqli_fetch_assoc($uinfo);
	}
?>

<?php
include("config.php");
ob_start();
if(!isset($_GET['no'])){
	// Al entrar a pages.php sin especificar un parametro con el metodo GET mandar a error: 404
	echo 'Redireccion: 404';
} else {
	$set_title= 'Error '.$_GET["no"];
	$error = $_GET['no'];

	switch($error){
		case '403':
			$error = 'Prohibido - No tienes permisos para acceder a la URL solicitada. - <a href="#" onclick="history.go(-1);return false;">Regresar a la pagina anterior</a>';
		break;
		case '404':
			$error = 'Pagina no encontrada - La URL solicitada '.$_SERVER['REQUEST_URI'].' no fu&eacute; encontrada en este servidor. - <a href="#" onclick="history.go(-1);return false;">Regresar a la pagina anterior</a>';
		break;
		case '505':
			$error = 'Oops! Algo sali&oacute; mal... - Se acabo el tiempo de espera. Por favor vuelva a intentarlo. - <a href="#" onclick="history.go(-1);return false;">Regresar a la pagina anterior</a>';
		break;
		case 'session':
			$error = 'No permitido - No se ha establecido una sesi&oacute;n. - <a href="#" onclick="history.go(-1);return false;">Regresar a la pagina anterior</a>';
		break;
		case 'php_version':
			$get_ver = phpversion();
			$error = '&Eacute;sta versi&oacute;n de PHP ('.$get_ver.') no es una versi&oacute;n valida requerida - <a href="#" onclick="history.go(-1);return false;">Regresar a la pagina anterior</a>';
		break;
		case 'mysql_error':
			$error = 'MySQL Error - No se ha establecido una conexion a la Base de Datos. Intente revisar los datos de configuraci&oacute;n e intentelo de nuevo. - <a href="#" onclick="history.go(-1);return false;">Regresar a la pagina anterior</a>';
			if(!$connect){
				/* Si no hay conexion */
			} else {
				header("Location: index.php");
			}
		break;
		default:
			// Default action
			echo 'NULL';
		break;
	}
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SimpleAdmin - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="../assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../assets/css/style.css" rel="stylesheet">

    </head>


    <body>

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">
                                <div class="text-center">
                                    <h2 class="text-uppercase m-t-0 m-b-30">
                                        <a href="index.php" class="text-success">
                                            <span><img src="../assets/images/logo.png" alt="" height="30"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <div class="text-center m-b-20">
                                        <img src="../assets/images/cancel.svg" title="invite.svg" height="80" class="m-t-10">
                                        <h3 class="expired-title"><?php echo $_GET["no"]; ?></h3>
                                        <p class="text-muted m-t-30 line-h-24"><?php echo $error; ?></p>
                                    </div>

                                    <div class="row m-t-30">
                                        <div class="col-xs-12">
                                            <a href="index.php" class="btn btn-lg btn-primary btn-block" type="submit">Back to Home</a>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.min.js"></script>

        <!-- App Js -->
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>

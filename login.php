<?php
include("config.php");
$alert='';
//Log In
if(isset($_POST["enter"])){
	if(isset($_POST["email"]) && isset($_POST["password"])){
		$password_encrypt = md5($_POST["password"]);
		$query = mysqli_query($connect,"SELECT * FROM empleado WHERE email='".$_POST["email"]."' AND password='".$password_encrypt."'");
		$data = mysqli_fetch_assoc($query);
			if($data["password"]==$password_encrypt){
				/* Conexion de 99 Dias */
				setcookie("session", $data["session"], time()+8553600);
				header("Location: index.php");
			} else {
				$alert = '
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Los datos no coinciden. <a href="javascript:history.back();">Reintentar</a>.
				</div>
				';
			}
	} else {
			$alert = '
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Te ha faltado algo. <a href="javascript:history.back();">Reintentar</a>.
			</div>
			';
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
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Sweet Alert -->
        <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">


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
                                        <a href="index.html" class="text-success">
                                            <span><img src="assets/images/logo.png" alt="" height="80"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="post" action="#">
									<?php echo $alert; ?>

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required="" placeholder="john@deo.com" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <a href="pages-forget-password.html" class="text-muted pull-right font-14">Forgot your password?</a>
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-30">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox5" type="checkbox">
                                                    <label for="checkbox5">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <input type="submit" class="btn btn-lg btn-primary btn-block" name="enter" value="Sign In" />
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark m-l-5">Sign Up</a></p>
                                </div>
                            </div>

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
        <!-- Sweet-Alert  -->
        <script src="../assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="../assets/pages/jquery.sweet-alert.init.js"></script>

    </body>
</html>

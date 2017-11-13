<?php
//Incluye los archivos de configuracion de la conexion, y los menus
include("config.php");
include("header.php");
include("aside.php");
$alert='';
if(isset($_POST["registrar"])){
	$password_encrypt = md5($_POST["password"]);
	$session = rand(0,10000000000);
	if($_POST["password"]==$_POST["confirm_password"]){
		//Comprobar que no exista un email anteriormente
		$revisar_email = mysqli_query($connect,"SELECT email FROM empleado WHERE email='".$_POST["email"]."'");
		if(mysqli_num_rows($revisar_email)>0){
			echo '<script>alert("El correo seleccionado ya esta en uso");</script>';
		} else {
			$datos = mysqli_query($connect,"INSERT INTO empleado SET area_id='".$_POST["area_id"]."', fullname='".$_POST["fullname"]."', email='".$_POST["email"]."', password='".$password_encrypt."', phone='".$_POST["phone"]."', session='".$session."'");
			if($datos){
				$alert=	'<div class="alert alert-success alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert"aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
					<strong>Exitoso</strong> Registro Exitoso.
					<a href="RegistroEmpleados.php" >ok</a>.
				</div>';
			} else {
				$alert='<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Te ha faltado algo. <a href="javascript:history.back();">Reintentar</a>.
				</div>';
			}
		}
	} else {
		echo '<script>alert("La constras&ntilde;as no coinciden");</script>';
	}
} ?>

                <!-- START PAGE CONTENT -->
                <div id="page-right-content">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-12">
                                <h4 class="m-b-20 header-title">Agregar Empleado</h4>

                                <div class="row">
                                    <div class="col-md-12">
																			<?php echo $alert; ?>
                                        <form class="form-horizontal" role="form"  method="post" action="" >
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nombre completo</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="" name="fullname" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" id="example-email" class="form-control" value="" name="email" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Contrase&ntilde;a</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" value="" name="password" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Confirmar contrase&ntilde;a</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" value="" name="confirm_password" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Telefono</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="" name="phone" />
                                                </div>
                                            </div>
																						<div class="form-group">
                                                <label class="col-md-2 control-label">Puesto</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="area_id" required>
																									<option value="">Seleccione</option>
																									<option value="1">Administrador</option>
																									<option value="2">Usuario</option>
																								</select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <input type="submit" class="btn btn-primary" name="registrar" value="Registrar" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
								</div>


                        </div>
                    </div>
                    <!-- end container -->


<?php
include("footer.php");
?>

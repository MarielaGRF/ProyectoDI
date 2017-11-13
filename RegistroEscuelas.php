<?php
//Incluye los archivos de configuracion de la conexion, y los menus
include("config.php");
include("header.php");
include("aside.php");
$alert='';
if(isset($_POST["registrar"])){
	$datos = mysqli_query($connect,"INSERT INTO escuela SET
	nombre_escuela='".$_POST["nombre_escuela"]."',
	modalidad='".$_POST["modalidad"]."',
	clave='".$_POST["clave"]."',
	phone='".$_POST["phone"]."',
	address='".$_POST["address"]."',
	date_signin=NOW() ");
	if($datos){
		$alert=	'<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert"aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</button>
			<strong>Exitoso</strong> Registro Exitoso.
			<a href="RegistroEscuelas.php" >ok</a>.
		</div>';
	} else {
		$alert='<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Te ha faltado algo. <a href="javascript:history.back();">Reintentar</a>.
		</div>';
	}
}

?>
                <!-- START PAGE CONTENT -->
                <div id="page-right-content">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-12">
                                <h4 class="m-b-20 header-title">Agregar Escuela</h4>

                                <div class="row">
                                    <div class="col-md-12">
																			<?php echo $alert; ?>
                                        <form class="form-horizontal" role="form"  method="post" action="" >
																					<div class="form-group">
																							<label class="col-md-2 control-label">Modalidad</label>
																							<div class="col-md-10">
																									<select class="form-control" name="modalidad" required>
																										<option value="">Seleccione</option>
																										<option value="Primaria">Primaria</option>
																										<option value="Secundaria">Secundaria</option>
																										<option value="Medio Superior">Medio Superior</option>
																										<option value="Superior">Superior</option>
																									</select>
																								</div>
																						</div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nombre</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="" name="nombre_escuela" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Clave</label>
                                                <div class="col-md-10">
																									<input type="text" class="form-control" value="" name="clave" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Telefono</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="" name="phone" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Direccion</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="address" ></textarea>
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

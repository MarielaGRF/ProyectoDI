<?php
//Incluye los archivos de configuracion de la conexion, y los menus
include("config.php");
include("header.php");
include("aside.php");
$alert='';
if(isset($_POST["registrar"])){
	$datos = mysqli_query($connect,"INSERT INTO alumno SET
	nombre_completo='".$_POST["nombre_completo"]."',
	fecha_nacimiento='".$_POST["fecha_nacimiento"]."',
	genero='".$_POST["genero"]."',
	nombre_escuela='".$_POST["area_id"]."',
	nombre_beca='".$_POST["id_beca"]."',
	phone='".$_POST["phone"]."',
	email='".$_POST["email"]."',
	address='".$_POST["address"]."',
	date_signin=NOW() ");
	if($datos){
		$alert=	'<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert"aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</button>
			<strong>Exitoso</strong> Registro Exitoso.
			<a href="RegistroAlumnos.php" >ok</a>.
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
                                <h4 class="m-b-20 header-title">Agregar Alumno</h4>

                                <div class="row">
                                    <div class="col-md-12">
																			<?php echo $alert; ?>
                                        <form class="form-horizontal" role="form"  method="post" action="" >
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nombre completo</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="" name="nombre_completo" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Fecha nacimiento</label>
                                                <div class="col-md-10">
                                                    <input type="date" id="example-email" class="form-control" value="" name="fecha_nacimiento" required />
                                                </div>
                                            </div>


																						<div class="form-group">
																								<label class="col-md-2 control-label">Genero</label>
																								<div class="col-md-10">
																										<select class="form-control" name="genero" required>
																											<option value="">Seleccione</option>
																											<option value="Hombre">Hombre</option>
																											<option value="Mujer">Mujer</option>
																										</select>
																									</div>
																							</div>

																							<div class="form-group">
	                                                <label class="col-md-2 control-label">Escuela</label>
	                                                <div class="col-md-10">
	                                                    <select class="form-control" name="area_id" required>
																													<option value="">Seleccione</option>
																													<?php //Muestra areas en el combobox del formulario
																													$MostrarAreas = mysqli_query($connect,"SELECT * FROM escuela ORDER BY escuela_id DESC");
																													if(mysqli_num_rows($MostrarAreas)>0){
																														while($A=mysqli_fetch_assoc($MostrarAreas)){
																															echo '<option value="'.$A["nombre_escuela"].'">'.$A["nombre_escuela"].'</option>';
																														}
																													}?>
																											</select>
	                                                </div>
	                                            </div>

																							<div class="form-group">
	                                                <label class="col-md-2 control-label">Area medica</label>
	                                                <div class="col-md-10">
	                                                    <select class="form-control" name="id_beca" required>
																													<option value="">Seleccione</option>
																													<?php //Muestra areas en el combobox del formulario
																													$MostrarAreas = mysqli_query($connect,"SELECT * FROM becas ORDER BY beca_id DESC");
																													if(mysqli_num_rows($MostrarAreas)>0){
																														while($A=mysqli_fetch_assoc($MostrarAreas)){
																															echo '<option value="'.$A["nombre_beca"].'">'.$A["nombre_beca"].'</option>';
																														}
																													}?>
																											</select>
	                                                </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Telefono</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="" name="phone" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" class="form-control" value="" name="email" />
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

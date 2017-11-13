<?php
include("config.php");
include("header.php");
include("aside.php");
$alert='';
if(isset($_POST["actualizar"])){
	$datos = mysqli_query($connect,"UPDATE escuela SET
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
				<strong>Exitoso</strong> La actualizacion se realizo efectivamente.
				<a href="RepEscuelas.php">Volver</a>.
			</div>';s
		} else {
			$alert='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Te ha faltado algo. <a href="javascript:history.back();">Reintentar</a>.
			</div>';
		}
	}
}
?>
<!-- START PAGE CONTENT -->
<div id="page-right-content">
  <div class="container">
      <div class="row">
        <div class="col-sm-12">
            <h4 class="m-b-20 header-title">Editar escuela</h4>
						<?php
								if(isset($_GET["id"])){
									$MostrarDatos = mysqli_query($connect,"SELECT * FROM escuela WHERE escuela_id='".$_GET["id"]."' LIMIT 1");
									if(mysqli_num_rows($MostrarDatos)>0){
											while($info=mysqli_fetch_assoc($MostrarDatos)){
						?>
              <div class="row">
                  <div class="col-md-12">
										<?php echo $alert; ?>
                      <form class="form-horizontal" role="form"  method="post" action="" >
                          <div class="form-group">
                              <label class="col-md-2 control-label">Nombre</label>
                              <div class="col-md-10">
                                  <input type="text" class="form-control" value="<?php echo $info["nombre_escuela"]; ?>" name="nombre_escuela required" />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-2 control-label">modalidad</label>
                              <div class="col-md-10">
                                  <select class="form-control" name="modalidad" required>
																		<option value="">Seleccione</option>
																		<option value="Primaria"<?php if($info["modalidad"]=='Primaria'){ echo ' selected'; } ?>>Primaria</option>
																		<option value="Secundaria"<?php if($info["modalidad"]=='Secundaria'){ echo ' selected'; } ?>>Secundaria</option>
																		<option value="Medio Superior"<?php if($info["modalidad"]=='Medio Superior'){ echo ' selected'; } ?>>Medio Superior</option>
																		<option value="Superior"<?php if($info["modalidad"]=='Superior'){ echo ' selected'; } ?>>Superior</option>

																	</select>
                              </div>
                          </div>

													<div class="form-group">
															<label class="col-md-2 control-label">Clave</label>
															<div class="col-md-10">
																	<input type="text" class="form-control" value="<?php echo $info["clave"]; ?>" name="clave" />
															</div>
													</div>

                          <div class="form-group">
                              <label class="col-md-2 control-label">Telefono</label>
                              <div class="col-md-10">
                                  <input type="text" class="form-control" value="<?php echo $info["phone"]; ?>" name="phone" />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-2 control-label">Email</label>
                              <div class="col-md-10">
                                  <input type="email" class="form-control" value="<?php echo $info["email"]; ?>" name="email" />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-2 control-label">Direccion</label>
                              <div class="col-md-10">
                                  <textarea class="form-control" name="address" ><?php echo $info["address"]; ?></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <input type="submit" class="btn btn-primary" name="actualizar" value="Actualizar" />
                              </div>
                          </div>
                      </form>
                  </div>
								</div>
			<?php  } } else { echo '<div class="row">escuela no encontrado.</div>'; } }  ?>
      </div>
  </div>
  <!-- end container -->
<?php
include("footer.php");
?>

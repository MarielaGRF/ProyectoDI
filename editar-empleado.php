<?php
include("config.php");
include("header.php");
include("aside.php");
$alert='';
if(isset($_POST["actualizar"])){
	$datos = mysqli_query($connect,"UPDATE empleado SET area_id='".$_POST["area_id"]."', fullname='".$_POST["fullname"]."', email='".$_POST["email"]."', phone='".$_POST["phone"]."' WHERE empleado_id='".$_GET["id"]."'");
	if($datos){
		$alert=	'<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert"aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</button>
			<strong>Exitoso</strong> La actualizacion se realizo efectivamente.
			<a href="RepEmpleados.php">Volver</a>.
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
                                <h4 class="m-b-20 header-title">Editar Empleado</h4>

<?php
if(isset($_GET["id"])){
	$MostrarDatos = mysqli_query($connect,"SELECT * FROM empleado WHERE empleado_id='".$_GET["id"]."' LIMIT 1");
	if(mysqli_num_rows($MostrarDatos)>0){
	while($info=mysqli_fetch_assoc($MostrarDatos)){ ?>

                                <div class="row">
                                    <div class="col-md-12">
																			<?php echo $alert; ?>
                                        <form class="form-horizontal" role="form"  method="post" action="" >
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nombre completo</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?php echo $info["fullname"]; ?>" name="fullname" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" id="example-email" class="form-control" value="<?php echo $info["email"]; ?>" name="email" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Puesto</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="area_id" required>
																												<option value="">Seleccione</option>
																												<?php
																												$MostrarAreas = mysqli_query($connect,"SELECT * FROM area ORDER BY id_area DESC");
																												if(mysqli_num_rows($MostrarAreas)>0){
																													while($A=mysqli_fetch_assoc($MostrarAreas)){
																														if($A["id_area"]==$info["area_id"]){ $isSelected=' selected'; } else { $isSelected=''; }
																														echo '<option value="'.$A["id_area"].'"'.$isSelected.'>'.$A["nombre_area"].'</option>';
																													}
																												}?>
																										</select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Telefono</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?php echo $info["phone"]; ?>" name="phone" />
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
<?php  } } else { echo '<div class="row">Empleado no encontrado.</div>'; } }  ?>

                        </div>
                    </div>
                    <!-- end container -->
										<!-- Sweet-Alert  -->
										<script src="../assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
										<script src="../assets/pages/jquery.sweet-alert.init.js"></script>

<?php
include("footer.php");
?>

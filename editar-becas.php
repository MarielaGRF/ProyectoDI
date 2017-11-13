<?php
include("config.php");
include("header.php");
include("aside.php");
$alert='';
if(isset($_POST["actualizar"])){
	$datos = mysqli_query($connect,"UPDATE beca SET
				 nombre_beca='".$_POST["nombre_beca"]."',
				 monto_beca='".$_POST["monto_beca"]."' ");

				 if($datos){
					 $alert=	'<div class="alert alert-success alert-dismissible fade in" role="alert">
						 <button type="button" class="close" data-dismiss="alert"aria-label="Close">
								 <span aria-hidden="true">&times;</span>
						 </button>
						 <strong>Exitoso</strong> La actualizacion se realizo efectivamente.
						 <a href="RepBecas.php">Volver</a>.
					 </div>';
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
            <h4 class="m-b-20 header-title">Editar Beca</h4>
						<?php
								if(isset($_GET["id"])){
									$MostrarDatos = mysqli_query($connect,"SELECT * FROM Becas WHERE beca_id='".$_GET["id"]."' LIMIT 1");
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
                                  <input type="text" class="form-control" value="<?php echo $info["nombre_beca"]; ?>" name="nombre_beca required" />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-2 control-label">Monto</label>
                              <div class="col-md-10">
                                  <input type="text" class="form-control" value="<?php echo $info["monto_beca"]; ?>" name="monto_beca" />
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
			<?php  } } else { echo '<div class="row">beca no encontrado.</div>'; } }  ?>
      </div>
  </div>
  <!-- end container -->
<?php
include("footer.php");
?>

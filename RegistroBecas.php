<?php
include("config.php");
include("header.php");
include("aside.php");
//agregar
$alert='';
if(isset($_POST["agregar"])){
	$datos= mysqli_query($connect,"INSERT INTO becas SET
    nombre_beca='".$_POST["nombre_beca"]."',
    monto_beca='".$_POST["monto_beca"]."' ");
  if($datos){
    $alert=	'<div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <strong>Exitoso</strong> Registro Exitoso.
      <a href="RegistroBecas.php" >ok</a>.
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
              <h4 class="m-t-0">Agregar Becas</h4>
<div class="row">
      <div class="col-md-12">
        <?php echo $alert; ?>
  <form class="form-horizontal" role="form"  method="post" action="?add=true">

  <div class="form-group">
      <label class="col-md-2 control-label">Nombre de la Beca</label>
      <div class="col-md-10">
          <input type="text" class="form-control" value="" name="nombre_beca" required />
      </div>
  </div>
  <div class="form-group">
      <label class="col-md-2 control-label">Monto</label>
      <div class="col-md-10">
          <input input type="number" class="form-control" value="" name="monto_beca" required />
      </div>
  </div>


  <div class="form-group">
      <div class="col-md-10">
          <input type="submit" class="btn btn-primary"  value="agregar" name="agregar"/>
      </div>
  </div>
</form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end container -->


<?php
include("footer.php");
?>

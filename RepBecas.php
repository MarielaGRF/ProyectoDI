<?php
include("config.php");
include("header.php");
include("aside.php");
?>
<!-- START PAGE CONTENT -->
<div id="page-right-content">
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0">Becas</h4>
                <div class="table-responsive">

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Monto</th>
                      <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $MostrarBecas = mysqli_query($connect ,"SELECT *FROM becas ");
                        if(mysqli_num_rows($MostrarBecas)>0){
                        	while($C=mysqli_fetch_assoc($MostrarBecas)){
                        ?>
                    <tr>
                        <td><?php echo $C["nombre_beca"]; ?></td>
                        <td><?php echo $C["monto_beca"]; ?></td>
                        <td><a href="editar-becas.php?id=<?php echo $M["beca_id"]; ?>"><i class="mdi mdi-pencil"></i></a> - <i class="mdi mdi-delete"></i></td>
                    </tr>
                  <?php } } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end container -->
<?php
include("footer.php");
?>

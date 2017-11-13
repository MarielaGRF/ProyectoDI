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
                                    <h4 class="m-t-0">Escuelas</h4>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Modalidad</th>
                                            <th>Nombre</th>
                                            <th>Clave</th>
                                            <th>Telefono</th>
                                            <th>Dirección</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
$MostrarEscuelas = mysqli_query($connect ,"SELECT *FROM escuela ");
if(mysqli_num_rows($MostrarEscuelas)>0){
	while($C=mysqli_fetch_assoc($MostrarEscuelas)){
?>
                                        <tr>
                                            <td><?php echo $C["modalidad"]; ?></td>
                                            <td><?php echo $C["nombre_escuela"]; ?></td>
                                            <td><?php echo $C["clave"]; ?></td>
                                            <td><?php echo $C["phone"]; ?></td>
                                            <td><?php echo $C["address"]; ?></td>
                                          <td><a href="editar-escuela.php?id=<?php echo $C["id"]; ?>"><i class="mdi mdi-pencil"></i></a> - <i class="mdi mdi-delete"></i></td>
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

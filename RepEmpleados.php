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
                                    <h4 class="m-t-0">Empleados</h4>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Area</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
$MostrarEmpleados = mysqli_query($connect,"SELECT a.*, m.* FROM area as a JOIN empleado as m WHERE a.id_area = m.area_id ORDER BY empleado_id DESC");
if(mysqli_num_rows($MostrarEmpleados)>0){
	while($M=mysqli_fetch_assoc($MostrarEmpleados)){
?>
                                        <tr>
                                            <td><?php echo $M["fullname"]; ?></td>
                                            <td><?php echo $M["nombre_area"]; ?></td>
                                            <td><?php echo $M["email"]; ?></td>
                                            <td><?php echo $M["phone"]; ?></td>
                                            <td><a href="editar-empleado.php?id=<?php echo $M["empleado_id"]; ?>"><i class="mdi mdi-pencil"></i></a> - <i class="mdi mdi-delete"></i></td>
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

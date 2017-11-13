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
                                    <h4 class="m-t-0">Alumnos</h4>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Escuela</th>
                                            <th>Beca</th>
											<th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
$MostrarPacientes = mysqli_query($connect ,"SELECT * FROM alumno ORDER BY alumno_id DESC");
if(mysqli_num_rows($MostrarPacientes)>0){
	while($P=mysqli_fetch_assoc($MostrarPacientes)){
?>
                                        <tr>
                                            <td><?php echo $P["nombre_completo"]; ?></td>
                                            <td><?php echo $P["nombre_escuela"]; ?></td>
                                            <td><?php echo $P["nombre_beca"]; ?></td>
                                            <td><a href="editar-alumno.php?id=<?php echo $P["alumno_id"]; ?>"><i class="mdi mdi-pencil"></i></a> - <i class="mdi mdi-delete"></i></td>
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

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
                              <h4 class="header-title m-t-0">Nueva Junta</h4>
                          </div>
                      </div> <!-- end row -->
					                 <div class="row">
                                <div class="col-sm-12">
                                    <div class="timeline timeline-left">
                                          <?php
                                              $MostrarDatos = mysqli_query( $connect,"SELECT a.*, c.*, e.*, p.* FROM alumno as a JOIN calendario_juntas as c
                                              JOIN escuela as e JOIN profesor as p
                                              WHERE a.nombre_escuela=e.nombre_escuela AND p.profesor_id=c.profesor_id AND e.escuela_id=c.escuela_id
                                               ");
                                            if(mysqli_num_rows($MostrarDatos)>0){
                                              echo '
                                                  <article class="timeline-item alt">
                                                      <div class="text-left">
                                                          <div class="time-show first">
                                                              <a href="#" class="btn btn-custom">Linea temporal</a>
                                                          </div>
                                                      </div>
                                                  </article>
                                            ';
                                          while($info=mysqli_fetch_assoc($MostrarDatos)){
                                            ?>
                                        <article class="timeline-item">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow"></span>
                                                        <span class="timeline-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                        <h4 class="text-muted"><?php echo $info["startdate"]; ?></h4>
                                                        <p class="timeline-date text-muted"><small><?php echo $info["title"]; ?></small></p>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                               <?php } } else { echo '<p>No hay registros en el Juntas Pendientes</p>'; } ?>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <!-- end container -->
<?php
include("footer.php");
?>

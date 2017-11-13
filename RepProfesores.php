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
                  <h4 class="m-t-0">Profesores</h4>
                  <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Opciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          $Mostrarprofesores = mysqli_query($connect ,"SELECT * FROM profesor ORDER BY profesor_id DESC");
                          if(mysqli_num_rows($Mostrarprofesores)>0){
                          	while($P=mysqli_fetch_assoc($Mostrarprofesores)){
                          ?>
                          <tr>
                              <td><?php echo $P["nombre_completo"]; ?></td>
                              <td><?php echo $P["phone"]; ?></td>
                              <td><?php echo $P["email"]; ?></td>
                              <td><a href="editar-profesor.php?id=<?php echo $P["profesor_id"]; ?>"><i class="mdi mdi-pencil"></i></a> - <i class="mdi mdi-delete"></i></td>
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

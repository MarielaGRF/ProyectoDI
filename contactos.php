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
              <h4 class="m-b-20 header-title">Contactos </h4>

							<?php
									$admin_res=mysqli_query($connect,"SELECT * from empleado");
									if(mysqli_num_rows($admin_res)>0){
										while($p=mysqli_fetch_array($admin_res)){ ?>
                            <div class="col-md-4">
                        		<div class="text-center card-box">
                                    <div class="clearfix"></div>
                                    <div class="member-card">
                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                            <img src="uploads/img/profile/<?php echo $p["picture"];?>" class="img-circle img-thumbnail" alt="profile-image">
                                            <i class="mdi mdi-information-outline member-star text-muted" title="unverified user"></i>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-5"><?php echo $p["fullname"];?></h4>
                                        </div>
                                        <?php echo '<a href="perfil.php?tipo=empleado&id='.$p["empleado_id"].'"><button type="button" class="btn btn-default btn-sm m-t-10">View Profile</button></a>'; ?>

                                    </div>

                                </div>

                            </div> <!-- end col -->
<?php			}
		} else {
			echo 'sin resultados';
		}
?>
							</div>
						</div>
                    <!-- end container -->
<?php
include("footer.php");
?>

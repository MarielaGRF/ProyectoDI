<?php
include("config.php");
include("header.php");
include("aside.php");
?>

                <!-- START PAGE CONTENT -->
                <div id="page-right-content">
                    <div class="container">

<?php

	$profile_table = $_GET["tipo"];
	switch($profile_table){
		case 'empleado':
			$profile_table = 'empleado';
			$ID = 'empleado_id';
		break;
		case 'alumno':
			$profile_table = 'alumno';
			$ID = 'alumno_id';
		break;
	}

	$profile = mysqli_query($connect,"SELECT * FROM {$profile_table} WHERE {$ID} = '".$_GET["id"]."' ");
	if(mysqli_num_rows($profile)>0){
		while($data=mysqli_fetch_assoc($profile)){
?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-0 text-center">
                                    <div class="member-card">
                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                            <img src="uploads/img/profile/<?php echo $data["picture"]; ?>" class="img-circle img-thumbnail" alt="profile-image">
                                            <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-5"><?php if($_GET["tipo"]=='alumno'){ echo $data["nombre_completo"]; } else if($_GET["tipo"]=='empleado'){ echo $data["fullname"]; } ?></h4>
                                        </div>
                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="m-t-30">
                            <ul class="nav nav-tabs tabs-bordered">
                                <li class="active">
                                    <a href="#home-b1" data-toggle="tab" aria-expanded="true">
                                        Profile
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home-b1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Personal Information</h3>
                                                </div>
                                                <div class="panel-body">
												<?php if($data["phone"]){ ?>
                                                    <div class="m-b-20">
                                                        <strong>Telefono</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $data["phone"]; ?></p>
                                                    </div>
												<?php } ?>
												<?php if($data["email"]){ ?>
                                                    <div class="m-b-20">
                                                        <strong>Email</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $data["email"]; ?></p>
                                                    </div>
												<?php } ?>
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->
                                        </div>

<?php
		}
	} else { echo '<div class="row"><p>La consulta retorn&oacute; 0 registros en nuestra Base de datos.</p></div>';  }
?>
					</div>
                    <!-- end container -->
<?php
include("footer.php");
?>

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
                                <h4 class="m-b-20 header-title">Resultados de busqueda <?php if(isset($_POST["q"])){ echo 'para "'.$_POST["q"].'"'; } ?></h4>

<?php
	include('config.php');
	$q=$_POST['q'];//se recibe la cadena que queremos buscar
	if(isset($q)){
		$admin_res=mysqli_query($connect,"SELECT * from alumno where (nombre_completo like '%$q%' or email like '%$q%' or phone like '%$q%') order by alumno_id LIMIT 6");
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
                                            <h4 class="m-b-5"><?php echo $p["nombre_completo"];?></h4>
                                        </div>
                                        <?php echo '<a href="perfil.php?tipo=alumno&id='.$p["alumno_id"].'"><button type="button" class="btn btn-default btn-sm m-t-10">View Profile</button></a>'; ?>

                                    </div>

                                </div>

                            </div> <!-- end col -->

<?php			}
		} else {
			echo 'sin resultados';
		}
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

            <!-- Page content start -->
            <div class="page-contentbar">

                <!--left navigation start-->
                <aside class="sidebar-navigation">
                    <div class="scrollbar-wrapper">
                        <div>
                            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <!-- User Detail box -->
                            <div class="user-details">
                                <div class="pull-left">
                                    <img src="uploads/img/profile/<?php echo $user["picture"]; ?>" alt="picture" class="thumb-md img-circle">
                                </div>
                                <div class="user-info">
                                    <a href="profile.php?type=admin&id=<?php echo $user["aid"]; ?>"><?php echo $user["fullname"]; ?></a>
                                    <p class="text-muted m-0">Administrador</p>
                                </div>
                            </div>
                            <!--- End User Detail box -->

                            <!-- Left Menu Start -->
                            <ul class="metisMenu nav" id="side-menu">
                                <li><a href="dashboard.php"><i class="ti-dashboard"></i> Dashboard </a></li>
                                <li>
                                     <a href="javascript: void(0);" aria-expanded="true"><i class=" mdi mdi-account-settings-variant"></i> Reporte <span class="fa arrow"></span></a>
                                     <ul class="nav-second-level nav" aria-expanded="true">
                                         <li><a href="RepAlumnos.php">Alumnos</a></li>
                                         <li><a href="RepProfesores.php">Profesores</a></li>
                                        <li><a href="RepEscuelas.php">Escuelas</a></li>
                                        <li><a href="RepEmpleados.php">Empleados</a></li>
                                        <li><a href="RepBecas.php">Becas</a></li>
                                     </ul>
                                </li>


                                <li>
                                    <a href="javascript: void(0);" aria-expanded="true"><i class=" mdi mdi-account-multiple-plus"></i> Registrar <span class="fa arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="RegistroAlumnos.php">Alumnos</a></li>
                                        <li><a href="RegistroProfesores.php">Profesores</a></li>
                                        <li><a href="RegistroEscuelas.php">Escuelas</a></li>
                                        <li><a href="RegistroEmpleados.php">Empleados</a></li>
                                        <li><a href="RegistroBecas.php">Becas</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" aria-expanded="true"><i class="mdi mdi-calendar-clock"></i> Juntas <span class="fa arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                      <li><a href="Eventos.php">Nueva</a></li>
                                      <li><a href="Junta.php">Lista </a></li>
                                    </ul>
                                </li>
                                <li><a href="contactos.php"><i class="mdi mdi-phone"></i>Contactos </a></li>
                            </ul>
                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->

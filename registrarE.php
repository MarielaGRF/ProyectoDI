<?php
if(isset($POST['nick']) && !empty($POST['nick']) &&
  isset($POST['email']) && !empty($POST['email']) &&
  isset($POST['password']) && !empty($POST['password']))
  ){
      $name=$POST['nick'];
      $email=$POST['email'];
      $password=$POST['password'];
      $passwordC=$POST['passwordC'];
      include'conexion.php';
      $db=connection();
      mysql_query("INSERT INTO RegistrarEmpleado(usuario,email,contraseña,puesto) values ('$name','$email','$password','$passwordC')")
         echo="Datos Guardados Exitosamente";
         echo="<a href= 'RegistrarE.html' > Volver a registro </a>"; 
}
 else
 {
   echo"No se han ingresado todos los datos";
 }

?>


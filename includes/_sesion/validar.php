
  
  <?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: login.php");
		die();
	}
  /**
   * Parte de registro de usuarios
   */
  require_once ("../base_de_datos.php");
$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");
 if(isset ($_POST['registrar'])){
if (strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['password']) >= 1 
&& strlen($_POST['telefono']) >= 1 && strlen($_POST['rol_id']) >= 1) {
      $nombre = trim($_POST['nombre']);
      $correo = trim($_POST['correo']);
      $password = trim($_POST['password']);
      $telefono = trim($_POST['telefono']);
      $rol_id = trim($_POST['rol_id']);

      $consulta = "INSERT INTO user (nombre, correo, telefono, password, rol_id)
      VALUES ('$nombre', '$correo', '$telefono', '$password', '$rol_id')";

     mysqli_query($conexion, $consulta);
     mysqli_close($conexion);
     header('Location: ../../views/usuarios.php');
 }
}
?>









  
  <?php

  
session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: _sesion/login.php");
		die();
	}
$total = $precioVenta * $existencia;
/**
 * Parte de registro de productos
 */
$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");  
if (strlen($_POST['codigo']) >= 1 && strlen($_POST['descripcion']) >= 1 && strlen($_POST['precioVenta']) 
>= 1 && strlen($_POST['precioCompra']) >= 1  && strlen($_POST['existencia']) >= 1  && strlen($_POST['fecha']) >= 1 ) {
	$codigo = $_POST["codigo"];
	$descripcion = $_POST["descripcion"];
	$precioVenta = $_POST["precioVenta"];
	$precioCompra = $_POST["precioCompra"];
	$existencia = $_POST["existencia"];
	$fecha = $_POST["fecha"];

	$consulta = "INSERT INTO productos (codigo, descripcion, precioVenta, precioCompra, existencia, fecha)
	VALUES ('$codigo', '$descripcion ', '$precioVenta', '$precioCompra', '$existencia', '$fecha' )";

   mysqli_query($conexion, $consulta);
   mysqli_close($conexion);
  header("Location: ./listar.php");
}

?>








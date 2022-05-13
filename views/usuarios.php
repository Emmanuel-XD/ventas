
<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location:../includes/_sesion/login.php");
		die();
	}else
	if($filas['rol_id']==2){ //empleado
		
		header('Location: ../includes/_sesion/login.php');
	
	}
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
include_once "encabezado.php";
require_once ("../includes/base_de_datos.php");


?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title></title>
</head>

<div class="container is-fluid">

	<h2 class="subtitle">¡Welcome Administrator <?php echo $_SESSION['nombre']; ?>!</h2>

<br>
<div class="col-xs-12">
		<h1>Lista de usuarios</h1>
    <br>
		<div>
			<a class="btn btn-success" href="../includes/_sesion/registros.php">Nuevo usuario 
        <i class="fa fa-plus"></i></a>
		</div>
		<br>



  <div class="container-fluid">
  <form class="d-flex">
			<form action="" method="GET">
			<input class="form-control me-2" type="search" placeholder="Escribe el correo, nombre o telefono....." 
			name="busqueda"> <br>
			<button class="btn btn-outline-info" type="submit" name="enviar"> <b>Buscar </b> </button> <br>
			</form>
  </div>

           <br>
                <?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////


$conexion=mysqli_connect("localhost","root","","ventas"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE user.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'
    OR telefono  LIKE'%".$busqueda."%'";
    
	}

}


?>


			</form>
        
        
            <table class="table table-bordered">

                   
                         <thead>    
                         <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Password</th>
                        <th>Telefono</th>
                        <th>Fecha_Registro</th>
                        <th>Rol de usuario</th>
                        <th>Acciones</th>
         
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");           
$SQL="SELECT  user.id, user.nombre, user.correo, user.password, user.telefono, 
user.fecha, permisos.rol FROM user 
LEFT JOIN permisos ON user.rol_id= permisos.id $where  ";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['password']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['rol']; ?></td>

<td>
<a class="btn btn-warning" href="../includes/editar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit"></i> </a>

  <a class="btn btn-danger" href="../includes/eliminar_user.php?id=<?php echo $fila['id']?>">
  <i class="fa fa-trash"></i></a>
  
</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>

    
    <?php
    
}

?>


	</body>
  </table>
<?php include_once "pie.php"?>
</html>

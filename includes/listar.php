
<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location:_sesion/login.php");
		die();
	}

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
include_once "../views/encabezado.php";
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

<div class="col-xs-12">
	
		<h1>Lista de productos</h1>
		<br>
		<div>
			<a class="btn btn-success" href="../views/formulario.php">Nuevo prodcuto
        <i class="fa fa-plus"></i></a>
		<a href="file.php" class="btn btn-primary"><b>Excel</b> </a>
		<a href="R_Product.php" class="btn btn-primary"><b>PDF</b> </a>
		<button onclick= "window.print()" class="btn btn-outline-secondary"> Imprimir</button>
		</div>
	
		<br>

  <div class="container-fluid">
  <form class="d-flex">
			<form action="" method="GET">
			<input class="form-control me-2" type="search" placeholder="Escribe el producto o codigo....." 
			name="busqueda"> <br>
			<button class="btn btn-outline-info" type="submit" name="enviar"> <b>Buscar </b> </button> 
			</form>
  </div>
  
</nav>
	
<br>

                <?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");  
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE productos.codigo LIKE'%".$busqueda."%' OR descripcion LIKE'%".$busqueda."%'";
	}
  
}


?>

<br>
        
            <table class="table table-bordered">
			<thead>
				<tr>
				
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Stock</th>
					<th>Total</th>
					<th>Inversion</th>
					<th>Ganancia</th>
					<th>Fecha_Registro</th>
					<th>Acciones</th>
				
				</tr>
			</thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");  
 
$SQL="SELECT * FROM productos $where ";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['codigo']; ?></td>
<td><?php echo $fila['descripcion']; ?></td>
<td><?php echo '$'.$fila['precioCompra']; ?></td>
<td><?php echo '$'.$fila['precioVenta']; ?></td>
<td><?php echo $fila['existencia']; ?></td>
<td><?php echo  '$'.$fila['precioVenta'] * $fila['existencia'] ; ?></td>
<td><?php echo  '$'.$fila['precioCompra'] * $fila['existencia'] ; ?></td>
<td><?php echo  '$'.($fila['precioVenta'] - $fila['precioCompra']) * $fila['existencia']; ?></td>
<td><?php echo $fila['fecha']; ?></td>

<td>
<a class="btn btn-warning" href="editar.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit"></i> </a>

  <a class="btn btn-danger" href="eliminar.php?id=<?php echo $fila['id']?>">
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
<?php
//$conexion=mysqli_connect("localhost","root","","ventas");  
 
 //$SQL="SELECT id, SUM(total)AS total FROM productos";
// $dato = mysqli_query($conexion, $SQL);

//if($dato -> num_rows >0){
   // while($fila=mysqli_fetch_array($dato)){
		?>   

<!--<h3>Total de Ganancia: <?php// echo '$'.$fila['total']  ;  ?></h3>-->

<?php
//}
//}

?>

<?php include_once "../views/pie.php"?>
</html>


<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location:../includes/_sesion/login.php");
		die();
	}

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

require_once ("../includes/base_de_datos.php");


?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../css/fontawesome-all.min.css">
	<link rel="stylesheet" href="../css/2.css">
	<link rel="stylesheet" href="../css/estilo.css">
    
    <title></title>
</head>

  <body>
	<nav class="navbar navbar-inverse navbar-fixed-top ">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">SISTEMA DE VENTAS</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				
					<li><a href="listar.php">Productos</a></li>
					<li><a href="vender.php">Venta</a></li>
					<li><a href="ventas.php">Historial_Ventas</a></li>
					
					<a class="btn btn-warning" href="../../includes/_sesion/cerrarSesion.php">Salir</a>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
            
<div class="col-xs-12">
		<h1>Lista de productos</h1>
		<div>
			<a class="btn btn-success" href="../views/formulario.php">Nuevo prodcuto
        <i class="fa fa-plus"></i></a>
		<a href="file.php" class="btn btn-primary"><b>Excel</b> </a>
		<a href="R_Product.php" class="btn btn-primary"><b>PDF</b> </a>
		</div>
		<br>
      
<section>
<nav class="navbar navbar-light">
  <div class="container-fluid">
  <form class="d-flex">
			<form action="" method="GET">
			<input class="form-control me-2" type="search" placeholder="Escribe el producto o codigo....." 
			name="busqueda"> <br>
			<button class="btn btn-outline-success" type="submit" name="enviar"> <b>Buscar </b> </button> <br>
			</form>
  </div>
</nav>
                <?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$conexion=mysqli_connect("localhost","root","","ventas"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE productos.codigo LIKE'%".$busqueda."%' OR descripcion LIKE'%".$busqueda."%'";
	}
  
}


?>


			</form>
        
        
            <table class="table table-bordered">
			<thead>
				<tr>
				
					<th>Código</th>
					<th>Descripción</th>
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

$conexion=mysqli_connect("localhost","root","","ventas");  
 
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

		</section>
		
	</body>
</table>
<?php include_once "../views/pie.php"?>
</html>

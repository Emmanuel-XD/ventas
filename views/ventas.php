<?php 

session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location:../includes/_sesion/login.php");
		die();
	}
?>

<?php include_once "encabezado.php" ?>
<?php
include_once "../includes/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, 
GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad 
SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos 
ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON
 productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva venta <i class="fa fa-plus"></i></a>
			<a href="../includes/reporte.php" class="btn btn-primary"><b>Excel</b> </a>
			<a href="../includes/R_Venta.php" class="btn btn-primary"><b>PDF</b> </a>
			<button onclick= "window.print()" class="btn btn-outline-secondary"> Imprimir</button>
		</div>
		
		<br>

		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha; ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Codigo</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo  '$',$venta->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "../includes/eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				
				<?php } ?>
			</tbody>
		</table>

		
		<?php

		//Calcular el total de ventas
$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");  
 
 $SQL="SELECT SUM(total)AS total FROM ventas ";
 $dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
		?>   

<h3>Total de ventas: <?php echo '$'.$fila['total'] ;  ?></h3>

<?php
}
}
?>
		

			
	</div>
<?php include_once "pie.php" ?>
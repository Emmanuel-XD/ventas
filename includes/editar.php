<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location:_sesion/login.php");
		die();
	}

	$id = $_GET['id'];
$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");  
	$consulta = "SELECT * FROM productos WHERE id = $id";
	$resultado = mysqli_query($conexion, $consulta);
	$producto = mysqli_fetch_assoc($resultado);

?>
<?php include_once "../views/encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $id;?></h1>
		<form method="POST" action="_functions.php">

	
			<label for="codigo">Código de barras:</label>
			<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código"  value="<?php echo $producto['codigo']; ?>">

			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto['descripcion']; ?></textarea>

			<label for="precioVenta">Precio de venta:</label>
			<input  class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta" value="<?php echo $producto['precioVenta']; ?>">

			<label for="precioCompra">Precio de compra:</label>
			<input  class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra" value="<?php echo $producto['precioCompra']; ?>">

			<label for="existencia">Existencia:</label>
			<input  class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia"value="<?php echo $producto['existencia']; ?>">
        	
			<label for="fecha">Fecha:</label>
	    	<input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $producto['fecha']; ?>">
			<input type="hidden" name="accion" value="editar_producto">
            <input type="hidden" name="id" value="<?php echo $id;?>">
			
			<br><br><input class="btn btn-success" type="submit" value="Editar">
			<a class="btn btn-danger" href="listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "../views/pie.php" ?>

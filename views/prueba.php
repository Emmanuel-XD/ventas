
<?php

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

<div class="col-xs-12">
		<h1>Lista de usuarios</h1>
		<div>
			<a class="btn btn-success" href="../includes/_sesion/registros.php">Nuevo usuario 
        <i class="fa fa-plus"></i></a>
		</div>
		<br>

<section>
			<form action="" method="GET">
				<input type="text" placeholder="Escribe tu correo o nombre" name="busqueda"> <br>
                <input type="submit" name="enviar" value="buscar"
                class="btn btn-warning"> <br>
			
                <?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////


$conexion=mysqli_connect("localhost","root","","ventas"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE productos.codigo LIKE'%".$busqueda."%'";
    
	}

  if (isset($_GET['busqueda']))
	{
    $where="WHERE productos.descripcion LIKE '%".$busqueda."%'";

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
					<th>Editar</th>
					<th>Eliminar</th>
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
<td><?php echo $fila['precioVenta']; ?></td>
<td><?php echo $fila['precioCompra']; ?></td>
<td><?php echo $fila['existencia']; ?></td>

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

		</section>
	</body>
</html>

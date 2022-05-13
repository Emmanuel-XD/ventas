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


<div class="col-xs-12">
	<h1>¡Envianos un mensaje!</h1>
    
    <br>
    
	<form method="post" action="../includes/enviarcorreo.php">
    <div class="form-group">
		<label for="nombre" class="form-label">Nombre</label>
		<input class="form-control" name="nombre" type="text" id="nombre" placeholder="Escribe tu nombre">
        </div>

        <br>
        <div class="form-group">
		<label for="correo" class="form-label">Correo:</label>
		<input id="correo" name="correo" type="email"  class="form-control" placeholder="Escribe tu correo"></textarea>
        </div>
<br>
        <div class="form-group">
		<label for="telefono" class="form-label">Telefono:</label>
		<input class="form-control" name="telefono" type="tel" id="telefono" placeholder="Escribe tu telefono">
        </div>
<br>
        <div class="form-group">
		<label for="mensaje" class="form-label">Mensaje:</label>
		<textarea class="form-control" name="mensaje" cols="30" rows="5" type="text" id="mensaje" 
        placeholder="Escribe tu mensaje......"></textarea>
        </div>
<br>
<input class="btn btn-primary" type="submit"  value="Enviar Mensaje">

	</form>
</div>
<?php include_once "pie.php" ?>
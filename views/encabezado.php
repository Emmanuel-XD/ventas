<?php

session_start();
error_reporting(0);
	$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location:../includes/_sesion/login.php");
		die();
	}
	else
        if($filas['rol_id']==2){ //empleado
            
            header('Location: ../index.php');
        
        }
/*
	Pequeño, muy pequeño sistema de ventas en PHP con MySQL

	@author emmanuelxd

*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
	
	<link rel="stylesheet" href="../css/fontawesome-all.min.css">

	<link rel="stylesheet" href="../css/estilo.css">
	<link rel="stylesheet" href="../css/es.css">
</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
<div class="container px-4">
<a class="navbar-brand" href="../index.php">SISTEMA DE VENTAS</a>

				 	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

				 <div class="collapse navbar-collapse" id="navbarResponsive">
				 <ul class="navbar-nav ms-auto">

		 <li class="nav-item"><a class="nav-link" href="../includes/listar.php">Productos</a></li>
		 <li class="nav-item"><a class="nav-link" href="../views/vender.php">Venta</a></li>
		 <li class="nav-item"><a class="nav-link"href="../views/ventas.php">Historial_Ventas</a></li>
		 <li class="nav-item"><a class="nav-link"href="../includes/_sesion/login.php" >Usuarios</a><li>
		 <li class="nav-item"><a class="nav-link"href="../views/contacto.php" >Soporte</a><li>
				</ul>

	<ul class="navbar-nav flex-row">
    <li class="nav-item me-3 me-lg-1">
    <a class="nav-link d-sm-flex align-items-sm-center" href="#">
	<span class="mr-2 d-none d-lg-inline text-gray-600 small">  
	<strong class="d-none d-sm-block ms-1"><?php echo $_SESSION['nombre']; ?></strong>
        </a>
      </li>

	  <a class="btn btn-warning " href="../includes/_sesion/cerrarSesion.php">Sign off</a>	
	</div>
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			
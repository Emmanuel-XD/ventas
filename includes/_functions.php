<?php
   
require_once ("./base_de_datos.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'editar_producto':
                editar_producto();
                break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;

            case 'insert_user';
            insert_user();
            break;

		}

	}

    function editar_producto() {
		$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");
		extract($_POST);
		$consulta="UPDATE productos SET codigo = '$codigo', descripcion = '$descripcion', 
        precioCompra = '$precioCompra',  precioVenta = '$precioVenta', existencia = '$existencia',
		fecha='$fecha' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header("Location: listar.php");

}

    function editar_registro() {
		$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo', password = '$password',
		telefono='$telefono', rol_id='$rol_id' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header("Location: ../views/usuarios.php");

}

function eliminar_registro(){
  $conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM user WHERE id = $id";
    mysqli_query($conexion, $consulta);

    header("Location: ../views/usuarios.php");
}

function acceso_user(){

  
		extract($_POST);
        $nombre=$_POST['nombre'];
        $password=$_POST['password'];
        session_start();
        $_SESSION['nombre']=$nombre;
        //$_SESSION['rol_id']=$rol_id;
    
        
        
        $conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");
        $consulta="SELECT*FROM user where nombre='$nombre' and password='$password'";
        $resultado=mysqli_query($conexion,$consulta);
        $filas=mysqli_fetch_array($resultado);
        

        if($filas['rol_id']==1){ //administrador
  
  
            header('Location: ../views/usuarios.php');
        
        
        }else
        if($filas['rol_id']==2){ //empleado
         
      
            header('Location: ../index.php');
        
        }
        
        else{
            
            header('location: _sesion/login.php');
            session_destroy();
        }
}

function insert_user(){
   $conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "INSERT INTO user (nombre, correo, telefono, password)
      VALUES ('$nombre', '$correo', '$telefono', '$password')";
    mysqli_query($conexion, $consulta);

    header("Location: ../views/usuarios.php");
}


?>

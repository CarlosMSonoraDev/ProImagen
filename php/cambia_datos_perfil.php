<?php
	require('conexion.php');

	session_start();

	if(!empty($_POST)){

        $mail = $_SESSION['correo'];

		$nuevo_nombre = $_POST['nombre']; 
        $nuevo_apellido = $_POST['apellido'];
        $select = $_POST['genero'];
        $query = "UPDATE usuario SET nombre='$nuevo_nombre', apellido='$nuevo_apellido' WHERE correo = '$mail'";
        $resultado = $mysqli->query($query);
        echo json_encode('exito');
    }else{
        echo json_encode('fallo');
    }          
    
?>

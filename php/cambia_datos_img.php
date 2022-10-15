<?php
	require('conexion.php');

	session_start();

	if(!empty($_POST)){

        $id = $_POST['Id-img'];
        $nombre = $_POST['nombre'];
        $select_categoria = $_POST['categoria'];
        $select_etiqueta = $_POST['etiqueta'];
        $fechaActual = date('y/m/d/');
        $query = "UPDATE imagenes SET nombre_imagen='$nombre', etiqueta='$select_etiqueta', categoria='$select_categoria', ultima_modificacion='$fechaActual' WHERE imagen_id = '$id'";
        $resultado = $mysqli->query($query);
        echo "exito";
    }else{
        echo "fallo";
    }          
    
?>

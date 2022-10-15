<?php

session_start();
//verifica si ya se inicio sesion
if(isset($_SESSION["id_usuario"]))
{

    if(!empty($_POST)){
        require_once "conexion.php";
        $id = $_POST['Id-elimina-img'];
        $query="DELETE FROM imagenes WHERE imagen_id ='$id' ";
        $resultado = $mysqli->query($query);
        echo "exito";
    }else{
        echo "fallo";
    } 
      
// si no se ha iniciado sesion regresa al index
}else  header("Location: index.php");

 ?>

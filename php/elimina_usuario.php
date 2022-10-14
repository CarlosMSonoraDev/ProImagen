<?php

session_start();
//verifica si ya se inicio sesion
if(isset($_SESSION["id_usuario"]))
{

    if(!empty($_POST)){
        require_once "conexion.php";
        $id = $_POST['prodId'];
        $query="DELETE FROM usuario WHERE id_usuario='$id' ";
        $resultado = $mysqli->query($query);
        echo json_encode('exito');
    }else{
        echo json_encode('fallo');
    } 
      
// si no se ha iniciado sesion regresa al index
}else  header("Location: index.php");

 ?>

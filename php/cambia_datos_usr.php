<?php
	require('conexion.php');

	session_start();

	if(!empty($_POST)){

        $id = $_POST['prodId'];
        $select_tipo_usr = $_POST['Tipo-Usuario'];
        $select2_trabaja_para = $_POST['Trabaja-para'];
        $query = "UPDATE usuario SET tipo_usuario='$select_tipo_usr', trabaja_para='$select2_trabaja_para' WHERE id_usuario = '$id'";
        $resultado = $mysqli->query($query);
        echo json_encode('exito');
    }else{
        echo json_encode('fallo');
    }          
    
?>

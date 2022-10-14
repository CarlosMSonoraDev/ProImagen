<?php
	require('conexion.php');

	session_start();

	if(!empty($_POST)){
        $mail = $_SESSION['correo'];
		$actual_pass = $_POST['actual-password-perfil']; 
        $nueva_pass = $_POST['nueva-passs-perfil']; 
        $hash = password_hash($nueva_pass, PASSWORD_DEFAULT, ['cost' => 10]);
        $query = "SELECT * FROM usuario WHERE correo = '$mail'";
		$resultado = $mysqli->query($query);
		$rows = $resultado->num_rows;
		if($rows > 0){
			$row = $resultado->fetch_assoc();
			if(password_verify($actual_pass, $row['contra'])){
                $query2 = "UPDATE usuario SET contra='$hash' WHERE correo = '$mail'";
               $resultado = $mysqli->query($query2);
                echo 1;
            }else{
                echo 0;
            }
		}else{
            echo 0;
        }
       
	}
?>

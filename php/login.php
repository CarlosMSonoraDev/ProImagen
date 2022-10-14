<?php
	require('conexion.php');

	session_start();

	if(!empty($_POST)){
		$mail = $_POST['correo-sesion'];
		$pass = $_POST['contra-sesion']; 
        $query = "SELECT * FROM usuario WHERE correo = '$mail'";
		$resultado = $mysqli->query($query);
		$rows = $resultado->num_rows;
		if($rows > 0){
			$row = $resultado->fetch_assoc();
			if(password_verify($pass, $row['contra'])){
				$_SESSION['id_usuario'] = $row['id_usuario'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['apellido'] = $row['apellido'];
				$_SESSION['correo'] = $row['correo'];
				$_SESSION['contra'] = $row['contra'];
				$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
				$_SESSION['genero'] = 0;
				echo json_encode('exito');
			}else{
                echo json_encode('fallado');
            }
		}
	}
?>

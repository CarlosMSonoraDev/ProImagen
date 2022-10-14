<?php

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm-passsword'];

  if($nombre === '' || $apellido === '' || $correo === '' || $password === ''){
    echo json_encode('Llena todos los campos');
  }else{
    require_once("conexion.php");  
    $tipo = "Usuario";
    $hay = 0;
    $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
  
    $consulta = "SELECT COUNT(correo) FROM usuario WHERE correo = '$correo'"; 
    $resultado = $mysqli->query($consulta);
  
    // revisa los resultados de si es que existe ya un registro 
    while($row = mysqli_fetch_array($resultado)){
      $hay = $row['COUNT(correo)'];
    }
          
    if($hay == 0){
      $query = "INSERT INTO usuario(id_usuario, nombre, apellido, correo, contra, tipo_usuario, trabaja_para)
                VALUES ('','$nombre','$apellido','$correo','$hash','$tipo','Nadie')";
       echo $resultado2 = $mysqli->query($query);
    }else{
      echo 0;
    }
  }


// ?>

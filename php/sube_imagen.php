<?php

    session_start();

   
        if(!empty($_POST)){

            require_once "conexion.php";

            $categoria = $_POST['categoria'];
            $etiquetas = $_POST['etiqueta'];
            $nombre_imagen = $_POST['nombre'];
            $fechaActual = date('y/m/d/');
            $usuario_que_subio_la_imagen = $_SESSION['nombre'];
            // nombre y ruta de la imagen
            $nombre_archivo_origen = $_FILES['imagen']['name'];
            $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
            // resolucion de la imagen
            $dimensiones = getimagesize($ruta_fichero_origen);
            $ancho = $dimensiones[0];
            $altura = $dimensiones[1];
            $x=" x ";
            $resolucion = $ancho.$x.$altura;
            // ruta de la carpeta para la copia de la imagen
            $ruta_indexphp = dirname(realpath(__FILE__));
            $ruta_nuevo_destino = $ruta_indexphp . '/../imagenes_subidas/' . $_FILES['imagen']['name'];
            // ruta para la vase de datos
            $carpeta = "imagenes_subidas/";
            $ruta = $carpeta.$nombre_archivo_origen;

            if ($nombre_archivo_origen != null) { 
                $arrayString = explode(".", $nombre_archivo_origen); 
                $extension = end($arrayString); 

                if($extension != "jpg" && $extension != "png" && $extension != "jpeg"){
                    echo 'extencion';
                }else{
                    if($ancho > 1024 || $altura > 1024 ){
                        echo 'size';
                    }else{
                        $query="INSERT INTO imagenes (tipo_imagen, autor, fecha_subido, ultima_modificacion, etiqueta, nombre_imagen, resolucion, categoria, likes, imagen)
                        values ('$extension','$usuario_que_subio_la_imagen','$fechaActual','$fechaActual','$etiquetas','$nombre_imagen','$resolucion','$categoria','0','$ruta')";
                        $resultado = $mysqli->query($query);
                        move_uploaded_file( $ruta_fichero_origen, $ruta_nuevo_destino );
                        echo 'exito';
                    }
                }
            }else{
                echo 'vacio';
            }

        }else{
            echo 'fallo';
        }




    
    

//     $_FILES["imagen"]['tmp_name'] as $key => $tmp_name;
//     $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
//     $max_tamanyo = 1024 * 1024 * 8;
//     $ruta_indexphp = dirname(realpath(__FILE__));
//     $ruta_fichero_origen = $_FILES['imagen']['tmp_name'][$key];
//     $ruta_nuevo_destino = $ruta_indexphp . '/../fotos/' . $_FILES['imagen']['name'][$key];
//     if ( in_array($_FILES['imagen']['type'][$key], $extensiones) ) {
//         //si pasa este if es una imagen con extencion valida que pusimos arriba
//         if ( $_FILES['imagen']['size'][$key]< $max_tamanyo ) {
//             //si pasa ese if tiene un tamaño valido puesto arriba
//             if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
//                //subido
//                $tipo=explode('.',$ruta_nuevo_destino);
//                $ext= end($tipo);
//             }else{
//                 json_encode("size");
//             } 
//         }else{
//             json_encode("extencion");
//         }
//     }

//     require_once "conexion.php";

//     //sacar la ruta de la imagenes
//     $carpeta = "fotos/";
//     $carpeta2 = "../fotos/";
//     $nombre = $_FILES['imagen']['name'][$key];
//     $punto = ".";
//     $ruta = $carpeta.$nombre;
//     $ruta2 = $carpeta2.$nombre;
//     //Sacar la resolucion de la imagen
//     $imagen = getimagesize($ruta2);    //Sacamos la información
//     $ancho = $imagen[0];   //Ancho
//     $alto = $imagen[1];   //Alto
//     $x=" x ";
//     $resolucion = $ancho.$x.$alto;
//     //variables
   
//    $extencion= $punto.$ext;
//    $usuario= $_SESSION['nombre'];
//    $fechaActual = date('d-m-Y');

//    $categoria = $_POST['categoria'];
//    $etiquetas = $_POST['etiqueta'];

//    $nombre_imagen = $_POST['nombre'];

        
   
//    $query="INSERT INTO imagenes (tipo_imagen, autor, fecha_subido, ultima_modificacion, etiqueta, nombre_imagen, resolucion, categoria, likes, imagen)
//            values ('$extencion','$usuario','$fechaActual','$fechaActual','$etiquetas','$nombre_imagen','$resolucion','$categoria','0','$ruta')";
//            $resultado = $mysqli->query($query);
//            json_encode("exito");

?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <!-- Mi CSS -->
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles-perfil.css">
	<title>Administrador Imagenes</title>
</head>
<body>
	<div class="cabecera">
		<div class="logo-box">
			<a class="logo-link" href="index.php">
                <img class="logo" src="../icons/camera.svg">
            </a>
		</div>
		<div class="titulo-box">
            <a class="titulo-pagina" href="index.php">ProImagen</a>
        </div>
			<header>
				<div class="box-btn-navbar">
					<a href="perfil.php" class="btn-navbar" >Perfil</a>
					<a href="#modal-admin" class="btn-navbar btn-administrador" >Administrador</a>
                    <a href="#modal-sube-imagenes" class="btn-navbar btn-administrador">Sube&nbsp;Imagenes</a>
					<a  class="btn-navbar btn-navbar-derecho" id="btn-cerrar-sesion">Cerrar&nbsp;Sesion</a>
				</div>
			</header>
	</div> 

    <!-- MODAL Administrador -->

	<section id="modal-admin" class="modal modal-admin">
		<div class="content-modal-admin">
			<h2 class="titulo-modal-admin">Administrador</h2>		
			<div class="modal-picture-admins">
				<div class="box-img usr">
					<a class="modal-picture-admin-users" href="administrador_usuarios.php">
						<img class="imagen-admin" src="../icons/admin-usuarios.svg">
					</a>
					<h2>Usuarios</h2>
				</div>
				<div class="box-img img">
					<a class="modal-picture-admin-imagenes" href="administrador_imagenes.php">
						<img class="imagen-admin" src="../icons/admin-imagenes.svg">
					</a>
					<h2>Imagenes</h2>
				</div>
				<div class="box-img categoria">
					<a class="modal-picture-admin-imagenes" href="administrador_categorias.php">
						<img class="imagen-admin" src="../icons/categorias.svg">
					</a>
					<h2>Categoria</h2>
				</div>
				<div class="box-img etiqueta">
					<a class="modal-picture-admin-imagenes" href="administrador_etiquetas.php">
						<img class="imagen-admin" src="../icons/etiquetas.svg">
					</a>
					<h2>Etiqueta</h2>
				</div>
			</div>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

    <!-- MODAL Sube Imagenes -->

	<section id="modal-sube-imagenes" class="modal modal-contra-perfil">
		<div class="content-modal">
			<h2>Sube imagenes</h2>
			<figure class="modal-picture">
				<img src="../icons/sube-imagen.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-sube-imagen">
                <input type="file" name="imagen" enctype="multipart/form-data" required="required">				
				<input  name="nombre" type="text" placeholder="Nombre de la imagen"  class="nombre" required="required" >
				<select name="categoria" class="genero">
					<option>Edificios</option>
					<option>Personas</option>
				</select>
				<select name="etiqueta" class="genero">
					<option>Estudiantes</option>
					<option>Docentes</option>
				</select>
				<div class="btns-modal-perfil"> 
					<a href="#header" class="modal-close modal-close-perfil">Regresar</a>
					<button id="btn-subir-imagen">Subir Imagen</button>
				</div>
			</form>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

    

	<script src="../js/cerrar_sesion.js"></script>
	<script src="../js/sube_imagen.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
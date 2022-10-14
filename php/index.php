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
	<title>Pagina Principal</title>
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
  <?php if(!isset($_SESSION["id_usuario"] )){ ?>
			<header>
				<div class="box-btn-navbar">
					<a href="#modal" class="btn-navbar" id="btn-ingresar">INGRESAR</a>
					<a href="#modal-registrarse" class="btn-navbar btn-navbar-derecho">REGISTRARSE</a>
				</div>
			</header>
    <?php } ?>
		<?php if(isset($_SESSION["id_usuario"] )){ 
			echo'<header>
				<div class="box-btn-navbar">
					<a href="perfil.php" class="btn-navbar" >Perfil</a>
					<a href="#modal-admin" class="btn-navbar btn-administrador" >Administrador</a>
					<a  class="btn-navbar btn-navbar-derecho" id="btn-cerrar-sesion">Cerrar&nbsp;Sesion</a>
				</div>
			</header>';
    } ?>
	</div> 

	<!-- MODAL INGRESAR -->
	<section id="modal" class="modal">
		<div class="content-modal">
			<h2>Inicio de Sesion</h2>
			<figure class="modal-picture">
				<img src="../icons/join.svg" class="modal-img modal-sesion-img">
			</figure>
			<form id="formulario-sesion">
				<input name="correo-sesion" type="text" placeholder="Correo"  class="e-mail" required="required">
				<input name="contra-sesion" type="text" placeholder="Contraseña"  class="password-ingreso" required="required">
				<div class="btns-modal">
					<a href="#header" class="modal-close">Regresar</a>
					<button>Ingresar</button>
				</div>
				<a href="#header" class="cerrar-modal"></a>
			</form>
		</div>
	</section>

	<!-- MODAL REGISTRARSE -->

	<section id="modal-registrarse" class="modal modal-registrarse">
		<div class="content-modal">
			<h2>Registro</h2>
			<figure class="modal-picture">
				<img src="../icons/perfil2.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-registro">
				<input  name="nombre" type="text" placeholder="Nombre"  class="nombre" required="required" pattern="[a-zA-Z0-9]{4,8}" title="4 a 8 letras minusculas sin simbolos">
				<input  name="apellido" type="text" placeholder="Apellido"  class="apellido" required="required" pattern="[a-zA-Z0-9]{4,8}" title="4 a 8 letras minusculas sin simbolos">
				<input  name="correo" type="email" placeholder="sophie@example.com"  class="correo" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com" title="Debe contener tres cadenas separadas por un @ y un .com">
				<input  id="password" name="password" type="text" placeholder="Contraseña"  class="pasword-registro" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Al menos un número, una letra en mayúscula, una letra en minúscula y al menos 8 caracteres" >
				<input  id="confirm-password" name="confirm-passsword" type="text" placeholder="Confirmar Contraseña"  class="paswordconfirm" required="required">
				<div class="btns-modal"> 
					<a href="#header" class="modal-close">Regresar</a>
					<button id="btn-registrarse">Registrarse</button>
				</div>
			</form>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

	
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
					<a class="modal-picture-admin-imagenes" href="administrador_imagenes.php">
						<img class="imagen-admin" src="../icons/categorias.svg">
					</a>
					<h2>Categoria</h2>
				</div>
				<div class="box-img etiqueta">
					<a class="modal-picture-admin-imagenes" href="administrador_imagenes.php">
						<img class="imagen-admin" src="../icons/etiquetas.svg">
					</a>
					<h2>Etiqueta</h2>
				</div>
			</div>
			
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

	<div class="portada-box">
		<img class="portada" src="../fotos/cabecera.jpg">
	</div>

	
	
	
	<script src="../js/registro.js"></script>
	<script src="../js/inicio_sesion.js"></script>
	<script src="../js/cerrar_sesion.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>


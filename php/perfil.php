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
	<title>Perfil</title>
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


    <div class="perfil">
			<div class="banner">
				<div class="box-img-perfil">
				<?php
					if($_SESSION['genero']==0){
				?>
						<img class="imagen-perfil" src="../icons/male-avatar.svg">
				<?php
					}elseif($_SESSION['genero']==1){
				?>
					<img class="imagen-perfil" src="../icons/female-avatar.svg">
				<?php		
					}else{
				?>
						<img class="imagen-perfil" src="../icons/male-avatar.svg">
				<?php
					}
				?>
					
				</div>
			</div>
		
		<table class="tabla-perfil">
			<?php
			require_once "conexion.php";
			$id = $_SESSION["id_usuario"];
			$query="SELECT nombre,apellido,correo,contra,tipo_usuario from usuario where id_usuario = '$id' ";
			$resultado = $mysqli->query($query);
			while($ver=mysqli_fetch_row($resultado))
			{
				$datos=$ver[0]."||".
					$ver[1]."||".
					$ver[2]."||".
					$ver[3]."||".
					$ver[4];
			?>
				<thead>
					<tr>
						<th colspan="2" class="titulo-perfil">Perfil</th>
					</tr>
					<tr>
						<th class="titulo-perfil">Dato</th>
						<th class="titulo-perfil">Registro</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="texto">Nombre:</td>
						<td class="texto"><?php echo $ver["0"]?></td>
					</tr>
					<tr>
						<td class="texto">Apellido:</td>
						<td class="texto"><?php echo $ver["1"]?></td>
					</tr>
					<tr>
						<td class="texto">Correo:</td>
						<td class="texto"><?php echo $ver["2"]?></td>
					</tr>
					<tr>
						<?php
						if($_SESSION['genero']==0){
						?>
							<td class="texto">Sexo:</td>
							<td class="texto">Hombre</td>
						<?php
						}elseif($_SESSION['genero']==1){
						?>
							<td class="texto">Sexo:</td>
							<td class="texto">Mujer</td>
						<?php
						}else{
						?>
							<td class="texto">Sexo:</td>
							<td class="texto">Indefinido</td>
						<?php
						}
						?>
					</tr>
					<tr>
						<td class="texto">Tipo de usuario:</td>
						<td class="texto"><?php echo $ver["4"]?></td>
					</tr>
				</tbody>
			<?php
          	}
          	?>
		</table>
		<div class="box-perfil-buttons">
			<a href="#modal-contra-perfil" class="btn-editar-contra-perfil">Cambiar contraseña</a>
			<a href="#modal-editar-perfil" class="btn-editar-perfil">Editar datos</a>
		</div>
    </div>

	<!-- MODAL CAMBIAR CONTRASEñA PERFIL -->

	<section id="modal-contra-perfil" class="modal modal-contra-perfil">
		<div class="content-modal">
			<h2>Edita tu contraseña</h2>
			<figure class="modal-picture">
				<img src="../icons/edit.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-contra-perfil">
				<input  id="password" name="actual-password-perfil" type="text" placeholder="Contraseña Actual"  class="pasword-registro" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Al menos un número, una letra en mayúscula, una letra en minúscula y al menos 8 caracteres" >
				<input  id="confirm-password" name="nueva-passs-perfil" type="text" placeholder="Nueva Contraseña"  class="paswordconfirm" required="required">
				<div class="box-olvidaste-contra">
					<a href="" class="olvidaste-contra">Olvidaste tu contraseña?</a>
				</div>
				<div class="btns-modal-perfil"> 
					<a href="#header" class="modal-close modal-close-perfil">Regresar</a>
					<button id="btn-guardar-cambios-perfil">Guardar Cambios</button>
				</div>
			</form>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

	<!-- MODAL EDITAR DATOS PERFIL -->

	<section id="modal-editar-perfil" class="modal modal-contra-perfil">
		<div class="content-modal">
			<h2>Cambia tus datos</h2>
			<figure class="modal-picture">
				<img src="../icons/edit.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-editar-perfil">				
				<input  name="nombre" type="text" placeholder="Nombre"  class="nombre" required="required" pattern="[a-zA-Z0-9]{4,15}" title="4 a 15 letras minusculas sin simbolos sin espacios">
				<input  name="apellido" type="text" placeholder="Apellido"  class="apellido" required="required" pattern="[a-zA-Z0-9]{4,15}" title="4 a 15 letras minusculas sin simbolos sin espacios">
				<select name="genero" class="genero">
					<option value="0">Hombre</option>
					<option value="1">Mujer</option>
				</select>
				<div class="btns-modal-perfil"> 
					<a href="#header" class="modal-close modal-close-perfil">Regresar</a>
					<button id="btn-guardar-cambios-perfil">Guardar Cambios</button>
				</div>
			</form>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>


	
	<script src="../js/cerrar_sesion.js"></script>
	<script src="../js/cambia_contra.js"></script>
	<script src="../js/cambia_datos_perfil.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
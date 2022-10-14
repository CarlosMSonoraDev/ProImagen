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
	<!-- Google icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Mi CSS -->
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles-administrador-usuario.css">
	<link rel="stylesheet" href="../css/styles-perfil.css">
	<title>Administrador usuarios</title>
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

    <!-- Tabla para dminsitrar a los usuarios -->

   <div class="administrador_usuarios">
        <div class="box-titulo-adm">
            <span class="titulo-adm">Administrador de Usuarios</span>
        </div>
        <table class="tabla-admin-usrs">
			<thead class="thead">
				<td>ID</td>
				<td>Nombre</td>
				<td>Apellido</td>
			    <td>Correo</td>
				<td>Tipo de usuario</td>
				<td>Trabaja para</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</thead>
            <tbody>
                <?php
				require_once "conexion.php";
				$query="SELECT id_usuario,nombre,apellido,correo,tipo_usuario,trabaja_para from usuario";
				$resultado = $mysqli->query($query);
				while($ver=mysqli_fetch_row($resultado))
				{
					$datos=$ver[0]."||".
					$ver[1]."||".
					$ver[2]."||".
					$ver[3]."||".
					$ver[4]."||".
					$ver[5];
				?>
                <tr class="filas">
					<td><?php echo $ver[0] ?></td>
				    <td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php echo $ver[4] ?></td>
					<td><?php echo $ver[5] ?></td>
                    <td>
						<a href="#modal-edicion-usuarios" class="btn-editar" onclick="get_id_edita_usr('<?php echo $datos ?>')">
							<span class="material-symbols-outlined">
								edit
							</span>
						</a>
					</td>
					<td>
						<a href="#modal-eliminar-usuarios" class="btn-editar" onclick="get_id_elimina_usr('<?php echo $datos ?>')">
							<span class="material-symbols-outlined">
							delete
							</span>
						</a>	
					</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
   </div>

	<!-- MODAL Edicion de datos Adminsitrador usuarios -->

	<section id="modal-edicion-usuarios" class="modal modal-contra-perfil">
		<div class="content-modal modal-adm-usr">
			<h2>Edita los datos del usuario</h2>
			<figure class="modal-picture">
				<img src="../icons/edit.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-cambia-datos-usr">
				<h1 class="titulo-admin-usr">Tipo de Usuario:</h2>
				<select name="Tipo-Usuario" class="genero">
					<option>Administrador</option>
					<option>Usuario</option>	
				</select>
				<h1 class="titulo-admin-usr">Trabaja para el usuario con ID:</h1>
				<select name="Trabaja-para" class="genero">
				<?php
					require_once "conexion.php";
					$query2="SELECT id_usuario from usuario";
					$resultado2 = $mysqli->query($query2);
					$row_cnt = mysqli_num_rows($resultado2);
					for ($i = 1; $i <= $row_cnt; $i++) {
						$ver2=mysqli_fetch_row($resultado2);
						$datos=$ver2[0];
					?>
						<option><?php echo $ver2[0];?></option>	
					<?php	
					}
					?>
						<option>Nadie</option>
				</select>
				<div class="btns-modal-perfil"> 
					<input id="Id-edita-usr" name="prodId" type="hidden">
					<a href="#header" class="modal-close modal-close-perfil">Regresar</a>
					<button id="btn-guardar-cambios-admin-usr">Guardar Cambios</button>
				</div>
			</form>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

	<!-- MODAL Para Confirmar La eliminacion del usuario -->

	<section id="modal-eliminar-usuarios" class="modal modal-contra-perfil">
		<div class="content-modal modal-adm-usr">
			<figure class="modal-picture">
				<img src="../icons/eliminar.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-elimina-usr">
				<h1 class="titulo-admin-usr">Estas seguro que deseas eliminar este usuario?. No podras revertilo!</h1>
				<div class="btns-modal-perfil"> 
					<input id="Id-elimina-usr" name="prodId" type="hidden">
					<a href="#header" class="modal-close modal-close-eliminar-usr">Regresar</a>
					<button id="btn-guardar-cambios-admin-usr" class="btn-borrar-usr">Si borralo!</button>
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
	
	<script src="../js/cerrar_sesion.js"></script>
	<script src="../js/cambia-datos-usr.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>


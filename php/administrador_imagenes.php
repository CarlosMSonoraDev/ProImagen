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
    <link rel="stylesheet" href="../css/styles-perfil.css">
	<link rel="stylesheet" href="../css/styles-administrador-usuario.css">
	<link rel="stylesheet" href="../css/styles-administrador-imagenes.css">
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

	<!-- Tabla para dminsitrar a las imagenes -->

	<div class="administrador_usuarios">
        <div class="box-titulo-adm">
            <span class="titulo-adm">Administrador de Imagenes</span>
        </div>
        <table class="tabla-admin-usrs">
			<thead class="thead">
				<td>ID</td>
				<td>Imagen</td>
				<td>Nombre</td>
				<td>Tipo</td>
			    <td>Autor</td>
				<td>Fecha Subido</td>
				<td>Ultima Modificacion</td>
				<td>Etiqueta</td>
				<td>Categoria</td>
				<td>Resolucion</td>
				<td>Likes</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</thead>
            <tbody>
                <?php
				require_once "conexion.php";
				$query="SELECT * from imagenes";
				$resultado = $mysqli->query($query);
				while($ver=mysqli_fetch_row($resultado))
				{
					$datos=$ver[0]."||".
					$ver[1]."||".
					$ver[2]."||".
					$ver[3]."||".
					$ver[4]."||".
					$ver[5]."||".
					$ver[6]."||".
					$ver[7]."||".
					$ver[8]."||".
					$ver[9]."||".
					$ver[10];
				?>
                <tr class="filas">
					<td><?php echo $ver[0] ?></td>
				    <td><?php echo'<img class="imagenes-tabla-administrador" src="../'.$ver[10].'">'?></td>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php echo $ver[4] ?></td>
					<td><?php echo $ver[5] ?></td>
					<td><?php echo $ver[6] ?></td>
					<td><?php echo $ver[8] ?></td>
					<td><?php echo $ver[7] ?></td>
					<td><?php echo $ver[9] ?></td>
                    <td>
						<a href="#modal-edicion-imagenes" class="btn-editar" onclick="get_id_edita_img('<?php echo $datos ?>')">
							<span class="material-symbols-outlined">
								edit
							</span>
						</a>
					</td>
					<td>
						<a href="#modal-eliminar-imagen" class="btn-editar" onclick="get_id_elimina_img('<?php echo $datos ?>')">
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

	<!-- MODAL Edicion de datos Adminsitrador Imagenes -->

	<section id="modal-edicion-imagenes" class="modal modal-contra-perfil">
		<div class="content-modal modal-adm-usr">
			<h2>Edita los datos de las imagenes</h2>
			<figure class="modal-picture">
				<img src="../icons/edit.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-cambia-datos-img">
				<h1 class="titulo-admin-usr">Nombre:</h1>
				<input  name="nombre" type="text" placeholder="Nombre de la imagen"  class="nombre" required="required" >
				<h1 class="titulo-admin-usr">Categoria:</h1>
				<select name="categoria" class="genero">
					<option>Edificios</option>
					<option>Personas</option>
				</select>
				<h1 class="titulo-admin-usr">Etiqueta:</h1>
				<select name="etiqueta" class="genero">
					<option>Estudiantes</option>
					<option>Docentes</option>
				</select>
				<div class="btns-modal-perfil"> 
					<input id="Id-edita-img" name="Id-img" type="hidden">
					<a href="#header" class="modal-close modal-close-perfil">Regresar</a>
					<button id="btn-guardar-cambios-admin-usr">Guardar Cambios</button>
				</div>
			</form>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

	<!-- MODAL Para Confirmar La eliminacion de la imagen -->

	<section id="modal-eliminar-imagen" class="modal modal-contra-perfil">
		<div class="content-modal modal-adm-usr">
			<figure class="modal-picture">
				<img src="../icons/eliminar.svg" class="modal-img modal-reg-img">
			</figure>
			<form id="formulario-elimina-img">
				<h1 class="titulo-admin-usr">Estas seguro que deseas eliminar esta imagen?. No podras revertilo!</h1>
				<div class="btns-modal-perfil"> 
					<input id="Id-elimina-img" name="Id-elimina-img" type="hidden">
					<a href="#header" class="modal-close modal-close-eliminar-usr">Regresar</a>
					<button id="btn-guardar-cambios-admin-usr" class="btn-borrar-usr">Si borrala!</button>
				</div>
			</form>
			<a href="#header" class="cerrar-modal"></a>
		</div>
	</section>

    

	<script src="../js/cerrar_sesion.js"></script>
	<script src="../js/sube_imagen.js"></script>
	<script src="../js/cambia_datos_img.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
function get_id_edita_usr(datos) {
  d = datos.split("||");

  document.getElementById("Id-edita-usr").value = d[0];
}

function get_id_elimina_usr(datos) {
  d = datos.split("||");

  document.getElementById("Id-elimina-usr").value = d[0];
}

var formulario_cambia_datos_usr = document.getElementById(
  "formulario-cambia-datos-usr"
);

formulario_cambia_datos_usr.addEventListener("submit", (event) => {
  event.preventDefault();

  var datos_cambia_datos_usr = new FormData(formulario_cambia_datos_usr);

  // id_usuario = new FormData();
  fetch("cambia_datos_usr.php", {
    method: "POST",
    body: datos_cambia_datos_usr,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data == "exito") {
        swal.fire({
          icon: "success",
          title: "Datos cambiados",
          text: "Los datos han sido actualizados correctamente",
        });
      } else if (data == "fallo") {
        swal.fire({
          icon: "error",
          title: "Error",
          text: "Algo salio mal",
        });
      }
    });
});

var formulario_elimina_usr = document.getElementById("formulario-elimina-usr");

formulario_elimina_usr.addEventListener("submit", (event) => {
  event.preventDefault();

  var datos_elimina_usr = new FormData(formulario_elimina_usr);

  fetch("elimina_usuario.php", {
    method: "POST",
    body: datos_elimina_usr,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data == "exito") {
        swal.fire({
          icon: "success",
          title: "Registro Eliminado",
          text: "El usuario ha sido eliminado correctamente",
        });
      } else if (data == "fallo") {
        swal.fire({
          icon: "error",
          title: "Error",
          text: "Algo salio mal",
        });
      }
    });
});

function get_id_edita_img(datos) {
  d = datos.split("||");

  document.getElementById("Id-edita-img").value = d[0];
}

function get_id_elimina_img(datos) {
  d = datos.split("||");

  document.getElementById("Id-elimina-img").value = d[0];
}

var formulario_cambia_datos_img = document.getElementById(
  "formulario-cambia-datos-img"
);

formulario_cambia_datos_img.addEventListener("submit", (event) => {
  event.preventDefault();
  console.log("estoy en el evento");
  var datos_cambia_datos_img = new FormData(formulario_cambia_datos_img);

  fetch("cambia_datos_img.php", {
    method: "POST",
    body: datos_cambia_datos_img,
  })
    .then((res) => res.text())
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

var formulario_elimina_img = document.getElementById("formulario-elimina-img");

formulario_elimina_img.addEventListener("submit", (event) => {
  event.preventDefault();

  var datos_elimina_img = new FormData(formulario_elimina_img);

  fetch("eliminar_imagen.php", {
    method: "POST",
    body: datos_elimina_img,
  })
    .then((res) => res.text())
    .then((data) => {
      if (data == "exito") {
        swal.fire({
          icon: "success",
          title: "Registro Eliminado",
          text: "La imagen ha sido eliminada correctamente",
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

var formulario_cambia_datos_perfil = document.getElementById(
  "formulario-editar-perfil"
);
formulario_cambia_datos_perfil.addEventListener("submit", (event) => {
  event.preventDefault();

  var datos_cambia_datos_perfil = new FormData(formulario_cambia_datos_perfil);
  fetch("cambia_datos_perfil.php", {
    method: "POST",
    body: datos_cambia_datos_perfil,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data == "exito") {
        swal.fire({
          icon: "success",
          title: "Datos cambiados",
          text: "Tus datos han sido actualizados correctamente",
        });

        setTimeout(myGreeting, 1000);

        function myGreeting() {
          document.location.href = "perfil.php";
        }
      } else if (data == "fallo") {
        swal.fire({
          icon: "error",
          title: "Error",
          text: "Algo salio mal",
        });
      }
    });
});

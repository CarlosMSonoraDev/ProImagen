var formulario_cambia_contra_perfil = document.getElementById(
  "formulario-contra-perfil"
);
formulario_cambia_contra_perfil.addEventListener("submit", (event) => {
  event.preventDefault();

  var datos_cambia_contra_perfil = new FormData(
    formulario_cambia_contra_perfil
  );
  fetch("cambia_contra.php", {
    method: "POST",
    body: datos_cambia_contra_perfil,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data == 1) {
        swal.fire({
          icon: "success",
          title: "Contraseña cambiada",
          text: "Tu contraseña ha sido actualizada correctamente",
        });
      } else if (data == 0) {
        swal.fire({
          icon: "error",
          title: "Error con la contraseña",
          text: "No existe un registro con esa contraseña intentalo de nuevo",
        });
      }
    });
});

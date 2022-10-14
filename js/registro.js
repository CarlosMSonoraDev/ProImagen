var formulario_registro = document.getElementById("formulario-registro");
formulario_registro.addEventListener("submit", (event) => {
  event.preventDefault();
  var contra1 = document.getElementById("password").value;
  var contra2 = document.getElementById("confirm-password").value;
  console.log("estoy dentro");
  if (contra1 != contra2) {
    swal.fire({
      icon: "warning",
      title: "Verificacion de contraseña",
      text: "Las Contraseñas no coinciden intentalo de nuevo",
    });
  } else {
    var datos = new FormData(formulario_registro);
    fetch("registrar_usuario.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == 1) {
          swal.fire({
            icon: "success",
            title: "Registro Realizado",
            text: "Ahora puedes ingresar y subir imagenes",
          });
        } else if (data == 0) {
          swal.fire({
            icon: "error",
            title: "Registro Fallido",
            text: "Ya existe un registro con ese correo o algo salio mal",
          });
        }
      });
  }
});

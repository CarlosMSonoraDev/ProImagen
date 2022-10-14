var formulario_sesion = document.getElementById("formulario-sesion");
formulario_sesion.addEventListener("submit", (event2) => {
  event2.preventDefault();
  var datos_login = new FormData(formulario_sesion);
  fetch("login.php", {
    method: "POST",
    body: datos_login,
  })
    .then((res) => res.json())
    .then((data2) => {
      if (data2 == "fallado") {
        swal.fire({
          icon: "error",
          title: "Algo salio mal",
          text: "Correo o Contraseña incorrectos",
        });
      } else if (data2 == "exito") {
        document.location.href = "index.php";
      }
    });
});

const clearEvents = () => {
  document.removeEventListener("DOMContentLoaded", onDocumentLoaded);

  var btn_cerrar_sesion = document.getElementById("btn-cerrar-sesion");
  if (btn_cerrar_sesion != null) {
    btn_cerrar_sesion.removeEventListener("click", onClickLogout);
  }
};

const onClickLogout = function (event) {
  swal.fire({
    icon: "success",
    title: "Sesion Cerrada",
    showConfirmButton: false,
  });

  console.log(
    setTimeout(function () {
      if (typeof Window !== "undefined") {
        clearEvents();
        window.location.href = "logout.php";
      }
    }, 1000)
  );
};

const onDocumentLoaded = function (event) {
  var btn_cerrar_sesion = document.getElementById("btn-cerrar-sesion");
  if (btn_cerrar_sesion != null) {
    btn_cerrar_sesion.addEventListener("click", onClickLogout);
  }
};

document.addEventListener("DOMContentLoaded", onDocumentLoaded);

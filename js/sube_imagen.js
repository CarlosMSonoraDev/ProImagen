var formulario_sube_img = document.getElementById("formulario-sube-imagen");

formulario_sube_img.addEventListener("submit", (event) => {
  event.preventDefault();
  var datos_sube_img = new FormData(formulario_sube_img);
  fetch("sube_imagen.php", {
    method: "POST",
    body: datos_sube_img,
  })
    .then((res) => res.text())
    .then((data) => {
      if (data === "exito") {
        swal.fire({
          icon: "success",
          title: "Imagen Subida Con Exito",
          text: "La imagen ha sido subida Correctamente. Puedes buscarla en la Pagina Principal",
        });
      } else if (data === "vacio") {
        swal.fire({
          icon: "warning",
          title: "Error",
          text: "Elige una imagen para subirla",
        });
      } else if (data === "fallo") {
        swal.fire({
          icon: "error",
          title: "Error",
          text: "Algo salio mal",
        });
      } else if (data === "size") {
        swal.fire({
          icon: "warning",
          title: "Imagen muy grande",
          text: "El tamaño de la imagen no es el correcto, la resolucion maxima es de: 1024 * 1024",
        });
      } else if (data === "extencion") {
        swal.fire({
          icon: "warning",
          title: "Error",
          text: "El tipo de la imagen no es el correcto, solo se admiten formatos .jpg .png .jpeg",
        });
      }
    });
});

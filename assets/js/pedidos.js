// Función para agregar herramienta o equipo (limpia el formulario)
function agregarHerramienta() {
  document.getElementById("pedidoForm").reset();
}

// Función para redireccionar al índice principal
function redirectToIndex() {
  // Aquí deberías agregar la lógica para redireccionar al índice principal.
  // Por ejemplo, puedes utilizar window.location.href = "index.html";
}

// Función para resetear el formulario
function resetForm() {
  document.getElementById("pedidoForm").reset();
}

// Función para mostrar el mensaje de éxito
function mostrarMensajeExito() {
  const mensaje = document.getElementById("mensajeExito");
  mensaje.textContent = "¡Tu pedido se ha enviado exitosamente!";
  mensaje.style.display = "block"; // Mostrar el mensaje

  // Redireccionar al índice principal después de mostrar el mensaje (opcional)
  redirectToIndex();

  // Después de 5 segundos, ocultar el mensaje de éxito y mostrar el formulario nuevamente
  setTimeout(function () {
    mensaje.style.display = "none";
    document.getElementById("pedidoForm").style.display = "block";
  }, 5000);
}

// Función para validar el formulario antes de enviar
function validarFormulario() {
  // Obtener los valores de los campos del formulario
  const nombreSolicitante = document.getElementById("nombreSolicitante").value;
  const nombreRetira = document.getElementById("nombreRetira").value;
  const salon = document.getElementById("salon").value;
  const curso = document.getElementById("curso").value;
  const rubro = document.getElementById("rubro").value;
  const subRubro = document.getElementById("subRubro").value;
  const descripcion = document.getElementById("descripcion").value;
  const cantidad = document.getElementById("cantidad").value;

  // Validar que todos los campos obligatorios estén completos
  if (
    !nombreSolicitante ||
    !nombreRetira ||
    !salon ||
    !curso ||
    !rubro ||
    !subRubro ||
    !descripcion ||
    !cantidad
  ) {
    alert("Por favor, complete todos los campos obligatorios (*)");
    return false;
  }

  // Validar que la cantidad sea un número entero mayor a 0
  if (isNaN(parseInt(cantidad)) || parseInt(cantidad) <= 0) {
    alert("La cantidad debe ser un número entero mayor a 0");
    return false;
  }

  // Si pasa todas las validaciones, el formulario es válido y se muestra el mensaje de éxito
  mostrarMensajeExito();

  // Ocultar el formulario mientras se muestra el mensaje
  document.getElementById("pedidoForm").style.display = "none";

  // Evitar el envío del formulario (se enviará después de mostrar el mensaje)
  return false;
}

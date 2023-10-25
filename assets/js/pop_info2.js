// Función para abrir el popup
function openPopup(profesor, curso, fecha, id) {
    var popupOverlay = document.createElement("div");
    popupOverlay.className = "popup-overlay";

    var popupContent = document.createElement("div");
    popupContent.className = "popup-content";

    popupContent.innerHTML = `
    
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <h2 class="title__inform"> Profesor: ${profesor}</h2>
        <h3 class="curso__inform"> Curso: ${curso}</h3> 
        <h4 class="curso__inform"> Fecha: ${fecha}</h4> 
        <form action="../php/logic/logic_orders/logic_form_reports.php" method="POST">
            <label for="texto">Observación:</label>
            <textarea style="width: 100%; resize: none;" id="texto" name="texto" rows="7" cols="60"></textarea>
            <input type="hidden" id="curso" name="curso" value="${curso}">
            <input type="hidden" id="profesor" name="profesor" value="${profesor}">
            <input type="hidden" id="fecha" name="fecha" value="${fecha}">
            <input type="hidden" id="id" name="id" value="${id}">
            <button type="submit" class="btn__blue">Enviar</button>
        </form>
    `;
    
    popupOverlay.appendChild(popupContent);
    document.body.appendChild(popupOverlay);
  }

  // Función para cerrar el popup
  function closePopup() {
    var popupOverlay = document.querySelector(".popup-overlay");
    if (popupOverlay) {
      document.body.removeChild(popupOverlay);
    }
  }

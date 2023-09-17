// Función para abrir el popup
function openPopup(profesor, curso, fecha, id) {
    var popupOverlay = document.createElement("div");
    popupOverlay.className = "popup-overlay";

    var popupContent = document.createElement("div");
    popupContent.className = "popup-content";

    popupContent.innerHTML = `
    
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <h2 style="color: black;"> Profesor: ${profesor}</h2>
        <h3 style="color: black;"> Curso: ${curso}</h3> 
        <h4 style="color: black;"> Fecha: ${fecha}</h4> 
        <br>
        <form action="../php/logic/logic_orders/logic_form_reports.php" method="POST">
            <label style="color: grey; margin-top: 60px;" for="texto">Observación:</label>
            <textarea style="resize: none; margin-top: 10px;" id="texto" name="texto" rows="7" cols="60"></textarea>
            <input type="hidden" id="curso" name="curso" value="${curso}">
            <input type="hidden" id="profesor" name="profesor" value="${profesor}">
            <input type="hidden" id="fecha" name="fecha" value="${fecha}">
            <input type="hidden" id="fecha" name="fecha" value="${id}">
            <button type="submit" class="btn__blue" style="margin-top: 17px;">Enviar</button>
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

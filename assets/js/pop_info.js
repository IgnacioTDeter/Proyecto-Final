// Función para abrir el popup
function openPopup() {
    var popupOverlay = document.createElement("div");
    popupOverlay.className = "popup-overlay";

    var popupContent = document.createElement("div");
    popupContent.className = "popup-content";

    popupContent.innerHTML = `
      <span class="popup-close" onclick="closePopup()">&times;</span>
      <h2>Título del Popup</h2>
      <p>Contenido del popup...</p>
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
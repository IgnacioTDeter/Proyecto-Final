function agregarHerramienta() {
    var herramientasDiv = document.getElementById("herramientas");
    var nuevaHerramienta = document.createElement("div");
    nuevaHerramienta.innerHTML = `
        <label for="herramienta[]">Herramienta:</label>
        <input type="text" name="herramienta[]" required maxlength="40">
        <label for="cantidad_solicitada[]">Cantidad Solicitada:</label>
        <input type="number" name="cantidad_solicitada[]" required maxlength="10">
        <button class="btn__blue" type="button" onclick="eliminarHerramienta(this)">Eliminar</button>  `;
    herramientasDiv.appendChild(nuevaHerramienta);
}

function eliminarHerramienta(elemento) {
    elemento.parentElement.remove();
}
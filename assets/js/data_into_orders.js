function changeStyle(color) {
  const elemento = document.querySelector(".status-select");
  
  elemento.style.padding = "5px 10px";
  elemento.style.fontSize = "34px";
  elemento.style.fontWeight = "bold";
  elemento.style.border = "none";
  elemento.style.backgroundColor = "rgba(209, 226, 53, 0.511)";
  elemento.style.borderRadius = "6px";
  elemento.style.color = "var(--sub-title-color)";
  elemento.style.appearance = "none";
  elemento.style.webkitAppearance = "none";
  elemento.style.mozAppearance = "none";
  elemento.style.textAlign = "center";
}

document.addEventListener("DOMContentLoaded", function () {
const borrarBtn = document.getElementById("deleteOrder");

borrarBtn.addEventListener("click", function () {
    const id = borrarBtn.getAttribute('delete-id'); // ID que deseas borrar (cambia según tus necesidades)
    
    // Enviar una solicitud al servidor utilizando Fetch API
    fetch(`../php/deleteOrder.php`)
        .then(response => response.text())
        .then(message => {
            console.log(message); // Puedes mostrar el mensaje en la consola o en el DOM
        })
        .catch(error => {
            console.error("Error:", error);
        });
});

let lastOpenedDropdown = null;

const btnTableBlueElements = document.querySelectorAll('.btn__table-blue');

btnTableBlueElements.forEach(btn => {
btn.addEventListener('click', (event) => {
event.preventDefault();

const rowId = btn.getAttribute('data-row-id');
const dropdownRows = document.querySelectorAll(`tr.custom-dropdown-row[data-row-id="${rowId}"]`);

// Cerrar el último desplegable abierto si hay uno
if (lastOpenedDropdown !== null && lastOpenedDropdown !== rowId) {
  const lastOpenedDropdownRows = document.querySelectorAll(`tr.custom-dropdown-row[data-row-id="${lastOpenedDropdown}"]`);
  lastOpenedDropdownRows.forEach(dropdownRow => {
    dropdownRow.style.display = 'none';
  });
}

// Abrir o cerrar el desplegable actual
dropdownRows.forEach(dropdownRow => {
  if (dropdownRow.style.display === 'none' || dropdownRow.style.display === '') {
    dropdownRow.style.display = 'table-row';
    lastOpenedDropdown = rowId;
  } else {
    dropdownRow.style.display = 'none';
    lastOpenedDropdown = null;
  }
});
});
});
});

document.addEventListener("DOMContentLoaded", function () {
  // Obtener el botón de borrar pedido
  const borrarBtn = document.getElementById("deleteOrder");

  // Agregar un evento de clic al botón de borrar
  borrarBtn.addEventListener("click", function () {
    const id = borrarBtn.getAttribute('delete-id'); // ID que deseas borrar (cambia según tus necesidades)

    // Enviar solicitud al servidor utilizando Fetch API
    fetch(`../php/deleteOrder.php`)
      .then(response => response.text())
      .then(message => {
        console.log(message); // Mostrar el mensaje en la consola o en el DOM
      })
      .catch(error => {
        console.error("Error:", error);
      });
  });

  let lastOpenedDropdown = null;

  // Obtener todos los elementos de botón de color azul en la tabla
  const btnTableBlueElements = document.querySelectorAll('.btn__table-blue');

  // Agregar evento clic a los botones de color azul
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

  // Función para cambiar los colores del estado del pedido y actualizar la celda
  function changeStatusColor(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];

    // Obtener la celda correspondiente
    const tableCell = selectElement.closest('td.table__cell');

    // Aplicar estilos de fondo y color del texto a la celda
    tableCell.style.backgroundColor = selectedOption.style.backgroundColor;
    tableCell.style.color = selectedOption.style.color;
  }

  // Obtener todos los elementos select con la clase status-select
  const statusSelects = document.querySelectorAll('.status-select');

  // Agregar el evento onchange a cada menú desplegable
  statusSelects.forEach((selectElement) => {
    changeStatusColor(selectElement); // Llamar a la función para establecer los colores iniciales
    selectElement.addEventListener('change', () => {
      changeStatusColor(selectElement);
    });
  });
});
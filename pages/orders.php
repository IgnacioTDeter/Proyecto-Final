<?php
// Incluir archivos necesarios
include('../php/connect_bd.php');
include('../php/checkPages.php');
// include('../php/logic/logic_orders/logic_form_reports.php');
include('../php/search/search_orders.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <title>Pañol - Pedidos</title>

</head>

<body>
  <header class="hero">
    <input type="checkbox" id="nav__check" hidden />
    <label for="nav__check" class="hamburger">
      <i class="ri-menu-line hamburger__icon"></i>
    </label>
    <nav class="nav">
      <div class="hero__logo hero__logo-1">
        <img class="hero__logo-img" src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" alt="logo" />
        <h2 class="title__hero">Pañol</h2>
        <label for="nav__check" class="hamburger">
          <i class="ri-menu-fold-line hamburger__icon"></i>
        </label>
      </div>
      <ul class="nav__list">
        <li class="nav__item">
          <a href="orders.php" class="nav__link">Pedidos</a>
        </li>
        <li class="nav__item">
          <a href="inventory.php" class="nav__link">Inventario</a>
        </li>
        <?php
        $allowedRoles = ['admin', 'panol'];
        if (in_array($_SESSION['rol'], $allowedRoles)) {
          // El usuario tiene el rol de "admin" o "tobias", muestra la opción "Informes".
          echo '<li class="nav__item">
                <a href="reports.php" class="nav__link">Informes</a>
              </li>';
        }
        ?>
        <li class="nav__item">
          <a href="../php/logout.php" class="nav__link">Cerrar sesión</a>
        </li>
      </ul>
    </nav>
    <div class="hero__logo hero__logo-0">
      <img class="hero__logo-img" src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" alt="logo" />
      <h2 class="title__hero">Pañol</h2>
    </div>
  </header>

  <section class="section__pedidos">
    <div class="title__section">
      <h1 class="section__title">Pedidos</h1>
    </div>
    <div class="action__div">
      <div class="add__div">
        <button class="btn__blue">
          <a href="form_newOrders.php" class="btn__blue--text">
            <i class="ri-add-circle-fill"></i>
            Añadir
          </a>
        </button>
      </div>

      <form method="GET" action="orders.php">
        <div class="search__container">
          <input name="search" type="search" class="search__input" placeholder="Buscar..." />
          <button class="btn__blue" type="submit" name="enviar">
            <p class="btn__blue--text">Buscar</p>
          </button>
        </div>
      </form>
    </div>
  </section>

  <section class="section__table">
    <div class="table__responsive">
      <table class="table">
        <!-- Encabezado de la tabla -->
        <thead class="table__header">
          <tr class="tr">
            <th class="table__header-item table__header-item-0">Dia</th>
            <th class="table__header-item">Profesor</th>
            <th class="table__header-item">Alumno</th>
            <th class="table__header-item" colspan="2">Datos</th>
            <th class="table__header-item">Estado</th>
            <th class="table__header-item">Acciones</th>
            <th class="table__header-item">Informe</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($orders)) {
            $rowId = $row['id_pedido']; // Obtener el id del pedido
            ?>
            <!-- Fila de la tabla para un pedido -->
            <tr class="tr" data-row-id="<?php echo $rowId; ?>">
              <!-- Celdas con datos del pedido -->
              <td class="table__cell table__cell-0">
                <?php echo $row['dia']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['profesor']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['alumno']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['salon']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['curso']; ?>
              </td>
              <!-- Columna para el estado del pedido -->
              <td class="table__cell">
                <!-- Contenedor del menú desplegable de estado -->
                <div class="status-dropdown">
                  <!-- Menú desplegable de estado -->
                  <select class="status-select" data-row-id="<?php echo $rowId; ?>">
                    <option value="no_entregado" <?php if ($row['estado'] === 'no_entregado')
                      echo 'selected'; ?>>No
                      entregado</option>
                    <option value="en_proceso" <?php if ($row['estado'] === 'en_proceso')
                      echo 'selected'; ?>>En proceso
                    </option>
                    <option value="devuelto" <?php if ($row['estado'] === 'devuelto')
                      echo 'selected'; ?>>Entregado</option>
                  </select>
                </div>
              </td>


              <!-- Acciones para el pedido (visualización, edición, eliminación) -->
              <td class="table__cell">
                <div class="btn-group">
                  <!-- Botones de estado -->
                  <?php
                  $allowedRoles = ['panol', 'admin'];
                  if (in_array($_SESSION['rol'], $allowedRoles)) {
                    // El usuario tiene el rol de "admin" o "tobias", muestra los botones con colores originales.
                    echo '<a href="#" class="btn__table btn__table-blue" data-row-id="' . $rowId . '"><i class="ri-eye-fill"></i></a>';
                    echo '<a href="form_editOrders.php?edit=' . $row['id_pedido'] . '" class="btn__table btn__table-yellow"><i class="ri-pencil-fill"></i></a>';
                    echo '<a href="../php/deleteOrder.php?id_pedido=' . $row['id_pedido'] . '" class="btn__table btn__table-red delete-button" delete-id="' . $rowId . '" id="deleteOrder"><i class="ri-close-circle-fill"></i></a>';
                  } else {
                    // El usuario no tiene el rol de "admin" o "tobias", muestra los botones en gris (#CCCCCC).
                    echo '<a href="#" class="btn__table btn__table-blue" data-row-id="' . $rowId . '"><i class="ri-eye-fill"></i></a>';
                    echo '<a href="" class="btn__table btn__table-yellow" style="background-color: #CCCCCC;"><i class="ri-pencil-fill"></i></a>';
                    echo '<a href="" class="btn__table btn__table-red " style="background-color: #CCCCCC;" delete-id="' . $rowId . '" id="deleteOrder"><i class="ri-close-circle-fill"></i></a>';
                  }
                  ?>

                </div>
              </td>
              <td>
                <?php
                if (in_array($_SESSION['rol'], $allowedRoles)) {
                  echo '<button class="btn__popup fas fa-exclamation-triangle" onclick="openPopup(\'' . $row['profesor'] . '\', \'' . $row['curso'] . '\', \'' . $row['dia'] . '\')" ></button>';
                } else {
                  echo '<button class="btn__popup fas fa-exclamation-triangle" style="background-color: #CCCCCC;" disabled></button>';
                }
                ?>


              </td>

            </tr>

            <?php
            $sql_detalles = "SELECT * FROM detalles_pedidos WHERE id_pedido = $rowId";
            $detalles = mysqli_query($conexion, $sql_detalles);
            ?>

            <!-- Filas de detalles relacionadas a la fila principal -->
            <tr class="custom-dropdown-row table__header-item table__header-item-0" style="display: none;"
              data-row-id="<?php echo $rowId; ?>">
              <th class="" colspan="4" style="background-color: hsl(0, 0%, 25%); border: solid 1px grey">Herramienta</th>
              <th class="" colspan="2" style="background-color: hsl(0, 0%, 25%); border: solid 1px grey">Cantidad</th>
              <th class="" colspan="2" style="background-color: hsl(0, 0%, 25%); border: solid 1px grey">Devoluciones</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($detalles)) {
              ?>
              <tr class="custom-dropdown-row" style="display: none;" data-row-id="<?php echo $rowId; ?>">
                <td colspan="4" class="table__cell" style="background-color: rgba(255, 255, 27, 0.470);">
                  <?php echo $row['herramienta']; ?>
                </td>
                <td colspan="2" class="table__cell" style="background-color: rgba(255, 255, 27, 0.470);">
                  <?php echo $row['cantidad_solicitada']; ?>
                </td>
                <td colspan="2" class="table__cell amount-column" style="background-color: rgba(255, 255, 27, 0.470);">

                  <div class="content-select">

                    <form method="post" action="../php/devolution.php">
                      <!-- Agrega un campo oculto para almacenar el ID del detalle del pedido -->
                      <input type="hidden" name="detalle_pedido_id" value="<?php echo $row['id']; ?>">
                      <!-- Agrega el select para la cantidad de devoluciones -->
                      <select name="cantidad_devoluciones" id="cantidad_devoluciones">
                        <?php
                        $cantidad = $row['cantidad_solicitada']; // Obtener la cantidad desde la columna
                    
                        for ($i = 0; $i <= $cantidad; $i++) {
                          $selected = ($i == $row['devoluciones']) ? 'selected' : '';
                          echo "<option value='$i' $selected>$i</option>";
                        }

                        $allowedRoles = ['admin', 'panol'];
                        if (in_array($_SESSION['rol'], $allowedRoles)) {

                          echo '<!-- Agrega un botón de enviar para enviar el formulario -->
                          <input type="submit" value="Guardar">';
                        }

                        ?>
                      </select>

                    </form>



                    <i></i>
                  </div>
                </td>
              </tr>
              <?php
            }
          }
          ?>
          <?php

          ?>
        </tbody>
      </table>
    </div>
  </section>

  <script src="../assets/js/data_into_orders.js"></script>
  <script src="../assets/js/pop_info2.js"></script>
  <script>
    // Obtén todos los botones de eliminación por su clase
    var deleteButtons = document.querySelectorAll(".delete-button");

    // Agrega un controlador de eventos a cada botón de eliminación
    deleteButtons.forEach(function (button) {
      button.addEventListener("click", function (event) {
        event.preventDefault(); // Evita que el enlace se siga inmediatamente

        // Muestra un cuadro de diálogo de confirmación
        var result = confirm("¿Estás seguro de que deseas eliminar este pedido?");

        // Si el usuario confirma, redirige al script de eliminación PHP
        if (result) {
          window.location.href = button.getAttribute("href");
        } else {
          // El usuario canceló la eliminación, no hagas nada
        }
      });
    });

    // Agregar un evento para cargar el estado actual desde el servidor
    const statusSelects = document.querySelectorAll(".status-select");

    statusSelects.forEach(function (statusSelect) {
      // Obtener el estado actual del servidor y seleccionarlo en el select
      fetch('../php/logic/logic_orders/logic_obtain_status.php') // Ajusta la URL según la ubicación de tu archivo obtener_estado.php
        .then(response => response.json())
        .then(data => {
          console.log(data); // Agrega esta línea para ver los datos en la consola

          // Busca el estado correspondiente al select actual
          const selectedOrderId = statusSelect.getAttribute("data-row-id");
          const selectedState = data.find(item => item.id === selectedOrderId);

          if (selectedState) {
            statusSelect.value = selectedState.estado;
          }
        })
        .catch(error => {
          console.error('Error al cargar el estado:', error);
        });

      // Agregar un evento para guardar el estado seleccionado en la base de datos
      statusSelect.addEventListener("change", function () {
        const newStatus = statusSelect.value;
        const selectedOrderId = statusSelect.getAttribute("data-row-id"); // Obtén el ID del pedido relacionado con este select

        // Enviar el nuevo estado y el ID del pedido al servidor para actualizarlo en la base de datos
        fetch('../php/logic/logic_orders/logic_actualizar_status.php', {
          method: 'POST',
          body: JSON.stringify({ newStatus, orderId: selectedOrderId }), // Envía el nuevo estado y el ID del pedido al servidor
          headers: {
            'Content-Type': 'application/json'
          }
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // El estado se actualizó con éxito
              console.log('Estado actualizado');
            } else {
              // Hubo un error al actualizar el estado
              console.error('Error al actualizar el estado:', data.error);
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
      });
    });


  </script>

</body>

</html>
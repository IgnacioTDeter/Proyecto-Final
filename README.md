# Proyecto-Final
El proyecto del pañol es una página web diseñada para administrar y gestionar un inventario de herramientas.
Permite llevar un registro de las herramientas disponibles, así como también de las solicitudes realizadas por diferentes usuarios.

<br>
<br>
<br>

# Registro de Versiones

## [Versión 3.3.0] - 15-10-2023
### Cambios

- Ahora, si solo existe 1 usuario con el rol de "administrador", este no podra ser eliminado
<br>


## [Versión 3.2.0] - 14-10-2023
### Cambios

- La pagina de Usuarios es capaz de modificar contraseñas y eliminar usuarios.
- Tambien ahora es capaz de agregar nuevos usuarios
  
<br>


## [Versión 3.1.0] - 13-10-2023
### Cambios

- Se modificaron ciertos accesos. Ahora el rol de "profesor" solo tendra acceso a visualizar el inventario y realizar pedidos
- Se creo la pagina de "Usuarios" (Solo disponible para adminsitradores)
  
<br>


## [Versión 3.0.0] - 12-10-2023
### Cambios

- Se modifico la base de datos, en la tabla de usuario, agregando la columna de "roles"
- Ahora existiran 3 roles: Profesor, Pañolero, Administrador
- Ahora solo podra acceder al formulario de "Agregar herramienta" aquel usuario con rol de administrador
  
<br>


## [Versión 2.9.0] - 20-9-2023
### Cambios

- Los datos preedetermidos se mostraran en el formulario principal como unica opcion para agregar herramientas al inventario
  
<br>

## [Versión 2.8.0] - 19-9-2023
### Cambios

- Se agrego un formulario en el cual se agregaran herramientas, rubros y subrubros preedeterminados, hechos unicamente por el administrador
  
<br>

## [Versión 2.7.0] - 17-9-2023
### Cambios

- Ahora cada herramienta tendra un estado, inicialmente se guardara en "buen estado"
- Se cambio la tabla de inventario, agregando la columna "estado"
- Se puede editar el estado de cada herramienta manualmente
  
<br>


## [Versión 2.6.0] - 2-9-2023
### Cambios

- Se pueden agregar herramientas por ID en la seccion del Inventario
- Se puede visualizar el ID de cada herramienta del inventario

<br>


## [Versión 2.5.0] - 10-9-2023
### Cambios

- Se implemento la funcionalidad de "Estado" para los pedidos. Esto ayudara a visualizar rapidamente si un pedido se encuentra No entregado, parcialmente entregado, o totalmente entregado
- Se modifico la tabla de pedidos agregando la columna de estado

<br>


## [Versión 2.4.0] - 2-9-2023
### Cambios

- Se creó la página de informes 

<br>


## [Versión 2.3.0] - 30-08-2023
### Cambios

- Se agregó el botón de informes
- Base de datos con nueva tabla "informes" 

<br>


## [Versión 2.2.1] - 24-08-2023
### Cambios

- se agrego en newOrders una logica para poder sumar o restar la cantidad devuelta
- modificaciones en base de datos 

<br>



## [Versión 2.2.0] - 24-08-2023
### Cambios

- Se agrego la columna "id_detalles" en la base de datos para las herramientas del inventario 
- Se agrego la columna "Status" a la base de datos

<br>

## [Versión 2.1.0] - 23-08-2023
### Cambios

- Opcion de eliminar Pedidos
- Solucion de varios errores de editar y agregar herramienta

  
<br>
<br>

## [Versión 2.0.0] - 21-08-2023
### Cambios
- funciones agregadas 
    -agregar hrramienta
    -input dinamicos

- actualizacion archivo add_tool.js

- creacion archivo data_into_orders.js
    -js que permite ver la informacion de las herramientas en los pedidos 

- translado de codigo php a archivos en carpetas nuevas

-creacion archivo checkPages.php
    -permite ver si la secion esta iniciada 

-Actualizacion de la BD

- se agrego 2 carpetas

<br>
. <br>
├── php  <br>
│   ├── logic <br>
│   │   ├── logic_inventory <br>
│   │   │   └── logic_tool.php <br>
│   │   └── logic_orders <br>
│   │       ├── logic_form_editarOrders.php <br>
│   │       └── logic_form_newOrders.php <br>
│   └── search <br>
│       ├── search_inventory.php <br>
│       └── search_orders.php <br>

    


<br>
<br>
  

## [Versión 1.1.0] - 19-08-2023
### Cambios
- Se agrego la columna "Estado" en la base de datos
- Ahora se pueden visualizar las herramientas en prestamo

<br>
<br>
  
## [Versión 1.0.0] 
### Cambios
- Poder agregar pedidos con varias herramientas
- Editar pedidos
- Agregar herramientas al inventario
- Visualizar los pedidos hechos
- Buscador de pedidos
- Buscador de herramientas
- Iniciar sesion
- Cerrar sesion
  

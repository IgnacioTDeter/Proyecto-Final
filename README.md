# Proyecto-Final
El proyecto del pañol es una página web diseñada para administrar y gestionar un inventario de herramientas.
Permite llevar un registro de las herramientas disponibles, así como también de las solicitudes realizadas por diferentes usuarios.

<br>
<br>
<br>

# Registro de Versiones


## [Versión 2.2.1] - 24-08-2023
### Cambios

- se agrego en newOrders una logica para poder sumar o restar la cantidad devuelta
- modificaciones en base de datos 





## [Versión 2.2.0] - 24-08-2023
### Cambios

- Se agrego la columna "id_detalles" en la base de datos para las herramientas del inventario 
- Se agrego la columna "Status" a la base de datos


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
  

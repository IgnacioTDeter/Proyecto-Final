# Proyecto-Final
El proyecto del pañol es una página web diseñada para administrar y gestionar un inventario de herramientas.
Permite llevar un registro de las herramientas disponibles, así como también de las solicitudes realizadas por diferentes usuarios.


=======
<br>
<br>
<br>

# Registro de Versiones


# TRABAJO EN PROCESO 
## Versión 3.4.0 - 4 de noviembre de 2023

### Cambios

- Se agregó una funcionalidad para recuperar contraseña mediante un mensaje al Gmail.
- Se modificó la base de datos para el campo Gmail.
- Se modificaron los índices de editar usuarios, usuarios y agregar usuarios.
- Se modificaron los archivos .php de agregar usuario y editar usuario.

### Importante

Para poder utilizar esta versión en modo local, es necesario hacer un par de cambios en el archivo php.ini y el archivo sendmail.ini en XAMPP.

Pasos a seguir:

1. Abrir las carpetas de XAMPP y encontrar la que se llama "php".
2. Abrir la carpeta "php".
3. Buscar el archivo .ini de PHP y abrirlo.
4. En el archivo .ini de PHP, buscar las siguientes líneas:
   - sendmail_from = suport.tevl@gmail.com
   - smtp_port=587
   - SMTP=smtp.gmail.com
   - sendmail_path ="C:\xampp\sendmail\sendmail.exe -t"
5. Abrir la carpeta "sendmail".
6. En el archivo .ini de sendmail, buscar las siguientes líneas:
   - smtp_server=smtp.gmail.com
   - smtp_port=587
   - auth_username= suport.t1.vl@gmail.com
   - auth_password= ******************

### Importante

Para poder utilizar esta función en el entorno local, el Gmail desde el cual se enviarán los mensajes debe tener habilitada la verificación en dos pasos. Para ello, se deberá entrar en la configuración de seguridad, habilitar la verificación en dos pasos y generar una contraseña de aplicación que se deberá colocar en sendmail.ini en la línea `auth_password=`.

<br>



## 22-10-2023 
### Cambios
- Se agrego un "¿Olvidaste tu contraseña", Falta arreglar los estilos
- Se agrego password_forgotten.php Este sera el formulario para enviar las credenciales de la cuenta asociada con el mail
- Se agrego sendMail.php, Esta sera la logica de php para enviar el mail
- Se agrego deleteTool.php, esta es la logica para eliminar las herramientas del inventario
- Se agrego un boton de eliminar en inventory.php

## [Versión 3.3.1] - 15-10-2023
### Cambios

- Se arreglo un problema a la hora de eliminar un usuario administrador. Si existia un solo administrador, no tenias permitido eliminar ningun  usuario. 
<br>


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

## [Versión 3.0.1] 
###Solucion de errores
- Se corrigio el sistema de usuraios
- validacion al momento de ir para atras
- error de cuentas guardadas 


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

## [Versión 2.5.1] 

### Solucion de errores 
- Al momento de modificar un estado ahora se guarda este y lo mismo si se refresca la pagina.
- 
<br>

## [Versión 2.5.0] - 10-9-2023
### Cambios

- Se modifico la funcionalida de "Estado" para los pedidos. Esto ayudara a visualizar rapidamente si un pedido se encuentra en No entregado, parcialmente entregado, o totalmente entregado
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

## [Versión 2.2.2] 
### Solucion de errores 
 1. La cantidad de herramientas no puede superar la cantidad del inventario
 2. Los datos del inventario ya no pueden ser menores a 0
 3. Las herramientas del inventario ya se modifican todas

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


### Solucion de errores 
- Al agregar  herramientas solo se agrega 1
- El boton de editar solo muestra 1 herramienta
- El estado de la herramienta no se guarda


<br>
<br>

## [Versión 2.0.0] - 21-08-2023
### Cambios
- funciones agregadas 
    -agregar herramienta
    -input dinamicos

- actualizacion archivo add_tool.js

- creacion archivo data_into_orders.js
    -js que permite ver la informacion de las herramientas en los pedidos 

- translado de codigo php a archivos en carpetas nuevas

- creacion archivo checkPages.php
    -permite ver si la secion esta iniciada 

- Actualizacion de la BD

- Se agrego 2 carpetas

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
>>>>>>> Stashed changes

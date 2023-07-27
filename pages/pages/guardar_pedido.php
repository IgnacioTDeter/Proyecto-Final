<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Pedido</title>
</head>
<body>
    <h2>Realizar Pedido</h2>
    <form action="../php/guardar_pedido.php" method="post">
        <label for="herramienta">Herramienta:</label>
        <input type="text" name="herramienta" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required><br>

        <label for="profesor">Profesor:</label>
        <input type="text" name="profesor" required><br>

        <label for="alumno">Alumno:</label>
        <input type="text" name="alumno" required><br>

        <label for="salon">Salón:</label>
        <input type="text" name="salon" required><br>

        <label for="curso">Curso:</label>
        <input type="text" name="curso" required><br>

        <input type="submit" value="Realizar Pedido">
    </form>
</body>
</html>

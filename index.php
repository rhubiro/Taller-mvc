<html>
    <head>
        <title>Listado de autos</title>
    </head>
    <body>
        <?php
        // Conexión a la base de datos db_mvc
        include("conexion.php");
        $consulta = "SELECT * FROM vehiculos";
        $resultado = mysqli_query($conexion, $consulta);
        ?>
        <h1>Lista de autos</h1>
        <a href = "agregar.php">Nuevo registro</a><br><br>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Marca</th>
                    <th>Año</th>
                    <th>Opciones</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                while($filas = mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['marca'] ?></td>
                    <td><?php echo $filas['anio'] ?></td>
                    <td>
                        <?php echo "<a href = 'modificar.php?id=".$filas['id']."'>Modificar</a>"; ?>
                        -
                        <?php echo "<a href=''>Eliminar</a>"; ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        // Cerramos conexión a la BD
        mysqli_close($conexion);
        ?>
    </body>
</html>
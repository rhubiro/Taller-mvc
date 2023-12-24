<html>
    <head>
        <title>Listado de autos</title>
        <script type="text/javascript">
            function confirmar() {
                return confirm('!Aviso! Si pulsas en OK, no podrás recuperar el registro');
            }
        </script>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <?php
        // Conexión a la base de datos db_mvc
        include 'conexion.php';
        $consulta = "SELECT * FROM vehiculos";
        $resultado = mysqli_query($conexion, $consulta);
        ?>
        <h1>Listado de autos</h1>
        <a href = "agregar.php">Nuevo registro</a><br><br>
        <table>
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Opciones</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                while($filas = mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['placa'] ?></td>
                    <td><?php echo $filas['marca'] ?></td>
                    <td><?php echo $filas['modelo'] ?></td>
                    <td><?php echo $filas['anio'] ?></td>
                    <td><?php echo $filas['color'] ?></td>
                    <td>
                        <?php echo "<a href = 'modificar.php?id=".$filas['id']."'>Modificar</a>"; ?>
                        -
                        <?php echo "<a href = 'eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>Eliminar</a>"; ?>
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
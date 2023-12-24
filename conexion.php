<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>mi conexion</title>
        </head>
        <body>
            <?php
            $conexion = mysqli_connect("localhost","root","RDGGmy\$q1","bd_mvc");
            if(!$conexion){
                die("No se conectó a la base de datos".mysqli_error());
            }
            echo "Conexión establecida";
            ?>
        </body>
    </head>
</html>
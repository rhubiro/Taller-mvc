<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>mi conexion</title>
        </head>
        <body>
            <?php
            $conexion = mysqli_connect("localhost:3307","root","","bd_mvc");
            if(!$conexion){
                die("No se conectó a la base de datos".mysqli_error());
            }
            echo "Conexión establecida"."<br><br>"."Current PHP version: ". phpversion();
            ?>
        </body>
    </head>
</html>
<html>
    <head>
        <title>Agregar</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <?php
        if(isset($_POST['enviar'])){
            $marca = $_POST['marca'];
            $anio = $_POST['anio'];

            include 'conexion.php';
            //Verificamos que no haya campos vacíos
            $sql = "INSERT INTO vehiculos(marca, anio) values('".$marca."', '".$anio."')";
            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                echo "<script language = 'JavaScript'> alert('Vehículo agregado correctamente'); location.assingn('index.php'); </script>";
            }else {
                echo "<script language = 'JavaScript'> alert('Error al agregar el registro'); location.assingn('index.php'); </script>";
            }
            mysqli_close($conexion);
        }else {
        ?>
        <h1>Agregar nuevo vehículo</h1>
        <form action = "<?=$_SERVER['PHP_SELF']?>" method = "post">
            <label>Marca:</label>
            <input type = "text" name = "marca"><br><br>
            <label>Año:</label>
            <input type = "text" name = "anio"><br><br>
            <input type = "submit" name = "enviar" value = "Agregar">
            <a href = "index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </body>
</htlm>
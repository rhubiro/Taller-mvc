<html>
    <head>
        <title>Agregar</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <?php
        if(isset($_POST['enviar'])){
            $placa = $_POST['placa'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];
            $color = $_POST['color'];

            include 'conexion.php';
            //Verificamos que no haya campos vacíos
            $sql = "INSERT INTO vehiculos(placa,marca,modelo,anio,color) values('".$placa."','".$marca."','".$modelo."','".$anio."','".$color."')";
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
            <label>Placa:</label>
            <input type = "text" name = "placa"><br><br>
            <label>Marca:</label>
            <input type = "text" name = "marca"><br><br>
            <label>Modelo:</label>
            <input type = "text" name = "modelo"><br><br>
            <label>Año:</label>
            <input type = "text" name = "anio"><br><br>
            <label>Color:</label>
            <input type = "text" name = "color"><br><br>
            <input type = "submit" name = "enviar" value = "Agregar">
            <a href = "index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </body>
</htlm>
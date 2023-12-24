<?php
include 'conexion.php';
?>
<html>
    <head>
        <title>Modificar</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <?php
        if(isset($_POST['enviar'])){
            // código que se ejecuta cuando presiona el botón Actualizar
            $id=$_POST['id'];
            $placa = $_POST['placa'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];
            $color = $_POST['color'];
            // actualización
            $sql="update vehiculos set marca='".$marca."', anio='".$anio."' WHERE ID='".$id."'";
            $resultado=mysqli_query($conexion,$sql);
            If($resultado){
                echo "<script language='JavaScript'>alert('Vehículo modificado correctamente'); location.assign('index.php'); </script>";
            }else {
                echo "<script language='JavaScript'>alert('Error al intentar actualizar los datos'); location.assign('index.php'); </script>";
            }
            mysqli_close($conexion);
        }else{
            // código que se ejecuta si no es presionado el botón Actualizar
            $id = $_GET['id'] ?? null; //capturamos el valor del parametro id de la url
            $sql="SELECT * FROM vehiculos WHERE ID='".$id."'";
            $resultado=mysqli_query($conexion,$sql);
            $fila=mysqli_fetch_assoc($resultado);
            $placa=$fila["placa"] ?? null;
            $marca=$fila["marca"] ?? null;
            $modelo=$fila["modelo"] ?? null;
            $anio=$fila["anio"] ?? null;
            $color=$fila["color"] ?? null;

            mysqli_close($conexion);
        ?>
        <h1>Modificar datos vehículo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method = "post">
            <label>Placa:</label>
            <input type="text" name="placa" value="<?php echo $placa; ?>"><br/>
            <label>Marca:</label>
            <input type="text" name="marca" value="<?php echo $marca; ?>">
            <label>Modelo:</label>
            <input type="text" name="modelo" value="<?php echo $modelo; ?>">
            <label>Año:</label>
            <input type="number" name="anio" min="0" maxlength="4" value="<?php echo $anio; ?>">
            <label>Color:</label>
            <input type="text" name="color" value="<?php echo $color; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="enviar" value="Actualizar">
            <a href="index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </body>
</html>
<?php
include 'conexion.php';
?>
<html>
    <head>
        <title>Modificar</title>
    </head>
    <body>
        <?php
        if(isset($_POST['enviar'])){
            // código que se ejecuta cuando presiona el botón Actualizar
            $id=$_POST['id'];
            $marca = $_POST['marca'];
            $anio = $_POST['anio'];
            // actualización
            $sql="update vehiculos set marca='".$marca."', anio='".$anio."' WHERE ID='".$id."'";
            $resultado=mysqli_query($conexion,$sql);
            If($resultado){
                echo "<script language='JavaScript'>alert('Vehiculo Modificado Correctamente'); location.assign('index.php'); </script>";
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
            $marca=$fila["marca"] ?? null;
            $anio=$fila["anio"] ?? null;

            mysqli_close($conexion);
        ?>
        <h1>Modificar datos vehículo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method = "post">
            <label>Marca:</label>
            <input type="text" name="marca" value="<?php echo $marca; ?>"><br><br>
            <label>Año:</label>
            <input type="number" name="anio" min="0" maxlength="4" value="<?php echo $anio; ?>"><br><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="enviar" value="Actualizar">
            <a href="index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </body>
</html>
<?php
$id=$_GET['id'] ?? null;
include("conexion.php");
$sql="DELETE FROM vehiculos WHERE ID='".$id."'";
$resultado=mysqli_query($conexion,$sql);
if($resultado) {
    echo "<script language='JavaScript'> alert('Registro eliminado correctamente'); location.assign('index.php'); </script>";
}else{
    echo "<script language='JavaScript'> alert('No se eliminó el registro'); location.assign('index.php'); </script>";
}
?>
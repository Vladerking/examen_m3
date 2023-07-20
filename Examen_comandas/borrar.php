<?php

    require_once "conexion.php";

    $id=$_GET['id'];

    $sql="DELETE FROM comandas_examen WHERE id_plato='" . $id ."'";

    if(mysqli_query($conexion,$sql)){
        echo ("Datos Borrados");
    }else {
        echo ("Intento fallido");
    }

echo "<script>location.href='index.php'</script>";
   
?>
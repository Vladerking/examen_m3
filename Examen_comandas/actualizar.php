<?php

    require_once "conexion.php";

    $id=$_GET['id'];

    $sql="UPDATE comandas_examen SET completo_plato='1' WHERE id_plato='" . $id ."'";

    if(mysqli_query($conexion,$sql)){
        echo ("Datos Actualizados");
    }else {
        echo ("Intento fallido");
    }

echo "<script>location.href='index.php'</script>";
   
?>
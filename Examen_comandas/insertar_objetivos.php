<?php

    require_once "conexion.php";


    $categoria=$_POST["categoria"];
    $texto=$_POST["texto"];
    $mesa=$_POST["mesa"];

    //$fecha=date("Y/m/d", strtotime($fecha));

    if(isset($_POST["entregado"])){
        $entregado=$_POST["entregado"];
    }else{
        $entregado=0;
    }

    $sql="INSERT INTO comandas_examen(categoria_plato, texto_plato, numero_mesa, completo_plato) 
    VALUES ('$categoria', '$texto', '$mesa', '$entregado')";

    if(mysqli_query($conexion,$sql)){
        echo ("Datos almacenados");
    }else {
        echo ("Intento fallido");
    }

echo "<script>location.href='index.php'</script>";
?>
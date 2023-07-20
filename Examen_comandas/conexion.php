<?php

$servidor="localhost";
$usuario="root";
$pass="";
$basedatos="examen_m2uf2"; //NOMBRE DE LA BASE DE DATOS, NO DE LA TABLA

$conexion=mysqli_connect($servidor,$usuario,$pass) or die ("Error de conexion");

mysqli_select_db($conexion,$basedatos);





?>
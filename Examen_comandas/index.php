<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Aplicación Comandas</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="http://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="estilos.css"/>

    <script>

    function f_aviso(){
        var comida=document.getElementById("texto");
        // alert(comida.value);
        
        if(comida.value !=""){
        alert("Comanda registrada")
        }else{
        alert("Error de registro")
        }
    }

    </script>

</head>
<body>
    <div id="contenedor">
        <div class="titulo"><h1>Comandas</h1></div>
        <form action="insertar_objetivos.php" method="POST">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">
                <option value="0">Entrante</option>
                <option value="1">Primer plato</option>
                <option value="2">Segundo plato</option>
                <option value="3">Postre</option>
            </select>

            <label for="texto">Plato a pedir:</label>
            <textarea name="texto" id="texto" placeholder="Hamburguesa sin lechuga" required></textarea>

            <label for="mesa">Mesa:</label>
            <select name="mesa" id="mesa" required>
                <option value="0">Principal</option>
                <option value="1">Mesa 1</option>
                <option value="2">Mesa 2</option>
                <option value="3">Mesa 3</option>
            </select>

            <label for="entregado">Plato Entregado</label>
            <input type="checkbox" name="entregado" id="entregado" value="1"/>

            <br/>

           <button type="submit" onclick="f_aviso();">Añadir Plato</button>
        </form>
    <?php

    require_once "conexion.php";

    $sql="SELECT * FROM comandas_examen";
    $resultado=mysqli_query($conexion,$sql) or die (mysqli_error($conexion));

    print("<div class='titulo'><h2>PLATOS EN ESPERA</h2></div>");

    //PLATOS EN ESPERA
    while($fila=mysqli_fetch_array($resultado)){
        if($fila['completo_plato']==0){
            if($fila['categoria_plato']==0){
                $categoria="Entrante";
            }elseif($fila['categoria_plato']==1){
                $categoria="Primer plato";
            }elseif($fila['categoria_plato']==2){
                $categoria="Segundo plato";
            }else{
                $categoria="Postre";
            };

            if($fila['numero_mesa']==0){
                $mesa="Principal";
            }elseif($fila['numero_mesa']==1){
                $mesa="Mesa 1";
            }elseif($fila['numero_mesa']==2){
                $mesa="Mesa 2";
            }else{
                $mesa="Mesa 3";
            }

            echo "<div class='objetivo'>";
            echo "<a href='actualizar.php?id=" . $fila['id_plato'] . "'><button class='boton_completar'>ENTREGAR</button></a><strong>";
            echo $categoria . "</strong><p>" . $fila['texto_plato'] . "</p> Para la mesa: " . $mesa;  
            echo "</div>";
        }
    }

    //PLATOS COMPLETOS
    print("<div class='titulo'><h2>PLATOS ENTREGADOS</h2></div>");
    $resultado=mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
    while($fila=mysqli_fetch_array($resultado)){
        if($fila['completo_plato']!=0){
            if($fila['categoria_plato']==0){
                $categoria="Entrante";
            }elseif($fila['categoria_plato']==1){
                $categoria="Primer plato";
            }elseif($fila['categoria_plato']==2){
                $categoria="Segundo plato";
            }else{
                $categoria="Postre";
            }

            if($fila['numero_mesa']==0){
                $mesa="Principal";
            }elseif($fila['numero_mesa']==1){
                $mesa="Mesa 2";
            }elseif($fila['numero_mesa']==2){
                $mesa="Mesa 3";
            }else{
                $mesa="Mesa 4";
            }

            echo "<div class='objetivo'>";
            echo "<a href='borrar.php?id=" . $fila['id_plato'] . "'><button class='boton_completar'>ELIMINAR</button></a><strong>";
            echo $categoria . "</strong><p>" . $fila['texto_plato'] . "</p> Para la mesa: " . $mesa;
            echo "</div>";
        }
    }
    ?>
    </div>
</body>
</html>
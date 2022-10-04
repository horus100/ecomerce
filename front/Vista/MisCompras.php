<?php
    // Verifica si hay datos a mostrar
    if (isset($mis_compras) && $mis_compras) {

        echo "MIS COMPRAS <br>";
        //Carga los datos del arreglo con un foreach
        foreach ($mis_compras as $compra){
            print_r($compra);
            echo "<br>";
            echo "<br>";}
    } else {
        echo "<h1>No hay registros de compras</h1>";
    }
    

?>
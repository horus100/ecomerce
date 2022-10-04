<?php
    //Verifica si hay datos a mostrar en la lista de ventas de productos
    if (isset($lp)) {
        echo "VENTA<br>";
        print_r($ver_venta);
        ?>
            <!-- Formulario con un select, para editar el estado de un producto-->
            <form action="<?=url_index?>venta/actualizar_estado_venta" method="POST">  
                <input type="hidden" name="id" value="<?=$ver_venta['ID']?>"> <br>
                <select name="estado" >
                    <option value="pendiente">pendiente</option>
                    <option value="en tramite">en tramite</option>
                    <option value="enviado">enviado</option>
                    <option value="completado">completado</option>
                </select>
                <br>
                <input type="submit" value="actualizar estado de venta">
            </form>
       <?php 
        echo "<br>";
        echo "ENVIO<br>";
        print_r($ver_envio);
        echo "<br>";
        echo "PRODUCTOS<br>";
        foreach ($lp as $fila){
            print_r($fila);
            echo "<br>";
            echo "<br>";}
    } else {
        echo "<h1>No hay datos</h1>";
    }
    

?>
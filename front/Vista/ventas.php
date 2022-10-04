<?php 
    //Verifica si hay un mensaje a mostrar
    if (isset($_SESSION['mensaje'])) {
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
    // Verifica que la variable no se null y no este vacia
    if (isset($ventas) && !empty($ventas)) {
        
        foreach ($ventas as $fila){
            print_r($fila);?>
             <!--Formulario que envia el ID del producto para consultar sus datos a detalle-->
            <form action="<?=url_index?>venta/ver_detalles" method="POST">  
                <input type="hidden" name="id" value="<?=$fila['ID']?>"> <br>
                <input type="submit" value="ver detalles">
            </form>
            <?php }
    } else {
        echo "<h1>No hay ventas en estos momentos</h1>";
    }
    

?>
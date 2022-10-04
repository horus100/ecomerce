<?php

    // Comprueba si existe una sesion mensaje, que contenga algun mensaje
    if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje']."<br>";
        $_SESSION['mensaje']="";
    }

    
    //Comprueba que exista una sesion Carrito y que contenga valores, de lo contrario muestra carrito vacio
    if(!empty($_SESSION['carrito']) && isset($_SESSION['carrito'])){
        echo "<h1> Carrito de Compras</h1><br>";
        foreach ($_SESSION['carrito'] as $producto){
            echo $producto["producto"]."/// <br>";
            echo $producto["nombre"]."/// <br>";
            echo $producto["precio"]."/// <br>";
            echo $producto["cantidad"]."/// <br>";
            echo $producto["costo"]."/// <br>";?>  
 
            <form action="<?=url_index?>Carrito/funcion"  method="post">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt(intval($producto["producto"]),COD,KEY);?>">
                <button class="btn btn-primary" name="btnAccion" value="Eliminar" type="submit">Borrar producto</button>
            </form>

<?php       
            echo " --------///////////------------- <br>"; }
    echo " --------/RESUMEN/-------------<br>"; 
    // Boton para pagar                         
    echo "<a href= ".url_index."Compra/registrar_compra> PAGAR </a><br>";
?>
    <!-- SBoton para borrar todo los productos elegidos-->
    <form action="<?=url_index?>Carrito/funcion"  method="post">
        <button class="btn btn-primary" name="btnAccion" value="Borrar_todo" type="submit">Borrar carrito</button>
    </form>
<?php
    }else{
        echo "<h1> Carrito Vacio</h1>";
        echo "<h2> Compre algunos productos</h2>";
    }
?>
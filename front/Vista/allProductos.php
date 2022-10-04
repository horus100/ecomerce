<?php
    // Comprueba si existe una lista para mostrar
        if (isset($lista)) {
            //Comprueba si hay un mensaje a mostrar
            if(isset($mensaje)){
                echo "<h1>".$mensaje."</h1> ";
            }
            // Se declara la variable iteracion para asignarlo en los nombres de los id de cada producto cargado
            $iteracion=0;
            ?>
            <!--Campo de entrada para buscar-->
            <input type="text" id="formulario" >
            <!--Div que contendra los productos cargado, no esta referenciado por ningun script-->
            <div id="lista_productos">
                <!--Div referenciado por el script busqueda para mostrar un mensaje-->
                <div id="mensaje"></div>
                <?php
                //Se cargan los productos de la lista por medio de un foreach
                foreach($lista as $producto) { ?>
                    <!-- El div producto no debe contener una etiqueta style, debe ser referenciado 
                            por la clase y en un archivo aparte css-->
                    <div class="col-3" id="producto<?=$iteracion?>">
                        <div class="card">
                            <img height="317px" title="<?php echo $producto['Nombre']?>" class="card-img-top" src="<?php echo $producto['Imagen']?>" alt="<?php echo $producto['Nombre']?>">
                            <div class="card-body">
                                <span id="nombre<?=$iteracion?>"><?php echo $producto['Nombre']?></span>
                                <h5 class="card-title">S/ <?php echo $producto['Precio_und']?></h5>
                                
                                <!--Se valida si hay stock del producto-->
                                <?php if (intval($producto['Cantidad'])>0) { ?>

                                <!--Formulario con entradas con valores ocultas, para enviar datos del producto de manera seguracion
                                    por medio de un formulario con el metodo oculto post-->
                                <form action="<?=url_index?>Carrito/funcion"  method="post">

                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt(intval($producto['ID']),COD,KEY);?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio_und'],COD,KEY);?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">

                                    <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                                </form>
                                
                                <?php } else{
                                    echo "<button class='btn btn-primary' type='button' disabled>Sin Stock</button>";
                                }?>

                                <!--Formulario con valor id del producto oculto, que se enviara al controlador ver_detalles, para la
                                    ver detalles del producto-->
                                <form action="<?=url_index?>index.php/Producto/ver_detalles"  method="post">

                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt(intval($producto['ID']),COD,KEY);?>">
                                    
                                    <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Ver detalles</button>
                                
                                </form>
                                <form action="<?=url_index?>index.php/Producto/editar_producto"  method="post">

                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt(intval($producto['ID']),COD,KEY);?>">
                                    
                                    <button class="btn btn-primary" name="btnAccion" value="Editar" type="submit">Editar</button>
                                
                                </form>

                            </div>
                        </div>
                    </div>
                <?php 
                
                $iteracion++;  } ?>
            </div>
            <!--Input referenciado por el script busqueda, para leer el total de productos cargados-->
            <input type="hidden" id="tproductos" value="<?php echo $iteracion?>">
            <!-- Se carga el script busqueda-->
            <script src="front/js/busqueda.js"></script>
            
<?php
            
        } else {
            echo "<h1> No hay una lista</h1>";
        }
        
?>
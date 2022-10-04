<?php

    // Verifica si existe detalles a mostrar
    if($detalles){
        echo ($detalles['Nombre']);
        ?>

            <div class="col-3">
                <div class="card">
                    <img height="317px" title="<?php echo $detalles['Nombre']?>" class="card-img-top" src="<?php echo $detalles['Imagen']?>" alt="<?php echo $detalles['Nombre']?>">
                    <div class="card-body">
                        <h3><span><?php echo $detalles['Nombre']?></span></h3>
                        <h4 class="card-title">Descripcion larga:  <?php echo $detalles['Descripcion_larga']?></h4>
                        <h4 class="card-title">S/ <?php echo $detalles['Precio_und']?></h4>
                        <h5 class="card-title">Stock:  <?php echo $detalles['Cantidad']?></h5>
                        <!-- Verifica si tiene stock-->
                        <?php if (intval($detalles['Cantidad'])>0) { ?>

                            <!--Formulario con imputs oculto, para agrarse al carrito-->
                            <form action="<?=url_index?>Carrito/funcion"  method="post">

                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt(intval($detalles['ID']),COD,KEY);?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($detalles['Nombre'],COD,KEY);?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($detalles['Precio_und'],COD,KEY);?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">

                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                            </form>
                        <?php } else{
                                echo "<button class='btn btn-primary' type='button' disabled>Sin Stock</button>";
                        }?>
                        
                    </div>
                </div>
            </div>
        <?php


    }else{
        echo "Hubo un error al mostrar datos";
    }

?>
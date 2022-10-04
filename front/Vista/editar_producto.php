<?php
   if (isset($_SESSION["mensaje"])) {
    print_r($_SESSION["mensaje"]);
    unset($_SESSION["mensaje"]);
   } 

    ?>
    <h1>Editar Producto</h1>


     <!--Formulario para registrar un nuevo producto-->
    <form action="<?=url_index?>producto/registrar_producto" method="POST">


        <label ><strong>Categoria </strong></label> <br>
        <select  name="categoria">
            <!--Verifica si existe categorias a mostrar-->
            <?php //Carga las categorias con un foreach
                foreach ($categorias as $ctg){
                    if ($ctg['Nombre']!=$producto['Categoria']) {                  
                                                                    ?>
                        <option value="<?= $ctg['ID']?>"><?= $ctg['Nombre']?></option>  
                        <?php 
                    }else { ?>
                        <option value="<?= $ctg['ID']?>" selected><?= $ctg['Nombre']?></option> 
                        <?php }}?>
        </select>
        <br> <label ><strong>Nombre </strong></label> <br> 
        <input type="text" name="nombre" value="<?= $producto['Nombre']?>"> <br>
        <label ><strong>Descripcion corta (60 Caracteres como maximo)</strong></label> <br> 
        <input type="text" name="Sdescrip" maxlength="60" value="<?= $producto['Descripcion_corta'] ?>"><br>
        <label ><strong>Descripcion Larga</strong></label> <br>
        <input type="text" name="descripcion" value="<?= $producto['Descripcion_larga']?>"> <br>
        <label ><strong>Stock</strong></label> <br>
        <input type="text" name="stock" value="<?=$producto['Cantidad']?>"> <br>
        <label ><strong>Precio Unitario</strong></label> <br>
        <input type="text" name="precioU" value="<?=$producto['Precio_und']?>"> <br>
        <label ><strong>Imagen</strong></label> <br>
        <input type="text" name="img" value="<?=$producto['Imagen']?>"> <br>

        <input type="submit">

    </form>
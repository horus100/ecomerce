<?php
   if (isset($_SESSION["mensaje"])) {
    print_r($_SESSION["mensaje"]);
    unset($_SESSION["mensaje"]);
   } 

    ?>
    <h1>Crear Producto</h1>


     <!--Formulario para registrar un nuevo producto-->
    <form action="<?=url_index?>producto/registrar_producto" method="POST">


        <label ><strong>Categoria </strong></label> <br>
        <select  name="categoria">
            <!--Verifica si existe categorias a mostrar-->
            <?php if (!empty($categorias)) {
                //Carga las categorias con un foreach
                foreach ($categorias as $ctg){
            
            ?>
            <option value="<?= $ctg['ID']?>"><?= $ctg['Nombre']?></option>  
            <?php }
                    } else {
                            echo "<option value=''>No hay Categorias registradas</option> <br> ";
                            }?>
        </select>
        <br> <label ><strong>Nombre </strong></label> <br> 
        <input type="text" name="nombre"> <br>
        <label ><strong>Descripcion corta (60 Caracteres como maximo)</strong></label> <br> 
        <input type="text" name="Sdescrip" maxlength="60"><br>
        <label ><strong>Descripcion Larga</strong></label> <br>
        <input type="text" name="descripcion"> <br>
        <label ><strong>Stock</strong></label> <br>
        <input type="text" name="stock"> <br>
        <label ><strong>Precio Unitario</strong></label> <br>
        <input type="text" name="precioU"> <br>
        <label ><strong>Imagen</strong></label> <br>
        <input type="text" name="img"> <br>

        <input type="submit">

    </form>
<?php
    // Verifica si hay datos a mostrar
   if (isset($_SESSION["mensaje"])) {
    print_r($_SESSION["mensaje"]);
    unset($_SESSION["mensaje"]);
   } 

    ?>
    <h1>Crear Categoria</h1>
   <!--Formulario para crear una nueva categoria-->
    <form action="<?=url_index?>producto/registrar_categoria" method="POST">


        <label ><strong>Nombre de Categoria</strong></label> <br>
        <input type="text" name="nombrectg"> <br>


        <input type="submit">

    </form>
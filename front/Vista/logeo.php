
<body>
    <h1>TITULO</h1>
    <?php
        //Verifica si existe un mensaje a mostrar
        if (isset($notificacion)) {
            echo "<strong>".$notificacion."</strong>";
        }
    ?>
    <!--Formulario de logeo del usuario
        Falta validar que la contraseña tenga caracteres alfanumericos y simbolos-->
    <form action="<?=url_index?>usuario/verificar" method="POST">
        <label><strong>Correo</strong></label> <br>
        <input type="email" placeholder="Ingrese su correo" name="email"> <br>
        <label><strong>Contraseña</strong></label> <br>
        <input type="password" placeholder="Ingrese su contraseña" name="password"> <br>
        <input type="submit">
    </form>

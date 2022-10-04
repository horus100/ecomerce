
    <!--Formulario registro de usuario, se asiganara un rol de usuario-->
    <form action="<?=url_index?>usuario/registrar" method="POST">

        <label for=""><strong>Nombres</strong></label> <br>
        <input type="text" placeholder="Ingrese sus nombres" name="nombre"> <br>
        <label for=""><strong>Apellidos</strong></label> <br>
        <input type="text" placeholder="Ingrese sus apellidos" name="apellido"> <br>
        <label for=""><strong>DNI</strong></label> <br>
        <input type="number" placeholder="Ingrese su DNI" name="dni"> <br>
        <label for=""><strong>Correo</strong></label> <br>
        <input type="email" placeholder="Ingrese su correo electronico" name="email"> <br>
        <label for=""><strong>Celular</strong></label> <br>
        <input type="number" placeholder="Ingrese su numero de celular" name="celular"> <br>
        <label for=""><strong>Contraseña</strong></label> <br>
        <input type="password" placeholder="Ingrese su contraseña" name="password"> <br>
        <input type="submit">

    </form>

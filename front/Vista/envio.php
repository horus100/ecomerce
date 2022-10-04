

    <?php
    // Variable para mostrar un mensaje del sistema
    echo $_SESSION["mensaje"];
    ?>
    <!-- Formulario para registrar el tipo y detalles del envio-->
    <!-- Falta validar que se completaron los campos-->
    <form action="<?=url_index?>compra/registrar_envio" method="POST">

        <label ><strong>Tipo de envio</strong></label> <br>
        <select name="tipo"  id="tipo">
            <option value="Local">Recoger en local</option>
            <option value="Delivery" selected>Envio delivery</option>
        </select> <br>
        <label ><strong>Fecha </strong></label> <br>
        <input type="date" name="fecha"> <br>
        <label ><strong>Hora </strong></label> <br>
        <input type="time" name="hora"> <br>
        <label id="l1"><strong>Departamento</strong></label> <br>
        <input type="text" name="dpto" id="dpto"> <br>
        <label id="l2"><strong>Provincia</strong></label> <br>
        <input type="text" name="prov" id="prov"> <br>
        <label id="l3"><strong>Distrito</strong></label> <br>
        <input type="text" name="dist" id="dist"> <br>
        <label id="l4"><strong>Direccion</strong></label> <br>
        <input type="text" name="dir" id="dir"> <br>
        <label id="l5"><strong>Referencia</strong></label> <br>
        <input type="text" name="ref" id="ref"> <br>
        <input type="submit">

    </form>




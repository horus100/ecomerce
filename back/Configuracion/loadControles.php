<?php
        function controles($classname){
            include 'back/Controlador/'.$classname.'.php';
        }
        spl_autoload_register('controles');    

?>
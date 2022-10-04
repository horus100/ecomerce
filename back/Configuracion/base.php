<?php
/*
Configuracion Base de la aplicacion
En esta archivo se cargaran la configuracion basica de la aplicacion y la configuracion de la base de datos
En este archivo se cargaran las plantillas basicas de navegacion y footer de la pagina
*/
    session_start();
    require_once "config.php";
    require_once "BD.php";
    require_once "loadControles.php";
    require_once "front/Vista/nav.php";

    if(isset ($_GET['controlador']) && isset ($_GET['accionar'])){

        $controlador=ucwords(strtolower($_GET['controlador']))."Control";
        $accion=strtolower($_GET['accionar']);
        if ( isset($controlador) && class_exists($controlador)) {
            $control= new $controlador();
            if (method_exists($controlador,$accion)) {
                $control->$accion();
            } else {
                $error=new ErrorControl();
                $error->index();
            }
            
        }else{
            $error=new ErrorControl();
            $error->index();
        }
        
        
    }elseif (!isset ($_GET['controlador']) && !isset($accion)){

        $controlador=inicio."Control";
        $control= new $controlador();
        $control->index();

    }else{

        $error=new ErrorControl();
        $error->index();

    }
    
    include_once "front/Vista/footer.php";
?>
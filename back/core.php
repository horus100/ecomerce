<?php
// Clase principal que carga la aplicacion
    class CoreApp{
        static $sesion = null;
        private function __construct (){
            //evita que los errores se muestren en pantalla
            error_reporting(0);
            $this->iniciar();
        }

        
        private function iniciar(){
            /*Llamo al archivo base que tiene la configuracion base del MVC */
            return require_once "Configuracion/base.php";
        }

        /* Incializo singletom: Para instancias una sola vez la clase*/
        public static function on () {

            if (is_null(self::$sesion)) {
                self::$sesion = new Self();
            }
            return self::$sesion;
        }
    }

?>
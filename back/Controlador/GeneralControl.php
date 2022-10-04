<?php
    class GeneralControl{
        public static function V_Sesion ($sesion){
            if (isset($_SESSION[$sesion]) && !empty($_SESSION[$sesion])){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>
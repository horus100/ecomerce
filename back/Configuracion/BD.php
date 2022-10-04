<?php
    include_once('config.php');

    class BD{

        static public function conectar(){
            try{
                $bd= new mysqli(HOST, USER, PASSWORD, DB);
                $bd->query("SET NAMES 'utf8'");
                return $bd;
            }

            catch(mysqli_sql_exception $e){
                echo 'Ocurre este problema: ',  $e->getMessage(), "\n";
            }
        }

    }


?>
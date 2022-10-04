<?php
    require_once __DIR__ . "/../Modelo/usuario.php";
    class UsuarioControl{

        public function index (){
            if (!GeneralControl::V_Sesion("usuario")){
                $notificacion="";
                if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje'])){
                    $notificacion=$_SESSION['mensaje'];
                    unset($_SESSION['mensaje']);
                    }
        
                require_once "front/Vista/logeo.php";
            }else {
                header("location: ".url_index);
            }
            
            }

        public function registro (){
            if (!GeneralControl::V_Sesion("usuario")){
                if (isset($_SESSION['mensaje'])){
                    unset($_SESSION['mensaje']);
                }
                require_once "front/Vista/registro.php";
            }else {
                header("location: ".url_index);
            }
        }

        public function registrar (){

            if (isset($_SESSION['mensaje'])){
                unset($_SESSION['mensaje']);
            }
            if ($_POST){
                $user= new Usuario();
                $user->setNombre($_POST["nombre"]);
                $user->setApellido($_POST["apellido"]);
                $user->setDNI($_POST["dni"]);
                $user->setCorreo($_POST["email"]);
                $user->setCelular($_POST["celular"]);
                $user->setPassword($_POST["password"]);
                $accion=$user->registrar_usuario();
                if ($accion){
                    $_SESSION['mensaje']="OK";
                } else{
                    $_SESSION['mensaje']="ERROR";
                }
                
                header("location: ".url_index."Usuario/index");
            }else{
                $_SESSION['mensaje']="ERROR";
                header("location: ".url_index."Usuario/index");
            }
            
        }

        public function verificar (){
            if ($_POST) {
                $user= new Usuario();

                $user->setCorreo($_POST["email"]);
                $user->setPassword($_POST["password"]);
                $accion=$user->validar();

                if ($accion) {
                    if(!empty($accion['Rol']) && $accion['Rol']=='admin'){
                        $_SESSION['admin']=$accion;
                        if(isset($_SESSION['link_espera']) ){
                            header($_SESSION['link_espera']);
                        }else{
                        header("Location: ".url_index."Producto/index");}
                    } else {
                        $_SESSION['usuario']=$accion;
                        if(isset($_SESSION['link_espera']) ){
                            header($_SESSION['link_espera']);
                        }else{
                            header("Location: ".url_index."Producto/index");}
                    }
                } else {
                    $_SESSION['mensaje']="ERROR INICIO DE SESION";
                    header("location: ".url_index."Usuario/index");

                }
                
            }else{
                echo "<h1>Datos no recibidos</h1>";
            }
          
        }

        public function cerrar_sesion() {
            if(isset($_SESSION['usuario'])){
                unset($_SESSION['usuario']);
            }
            if(isset($_SESSION['admin'])){
                unset($_SESSION['admin']);
            }
            header("Location:".url_index);
        }

    }

?>
<?php
    require_once __DIR__ . "/../Modelo/envio.php";
    require_once __DIR__ . "/../Modelo/venta.php";
    require_once __DIR__ . "/../Modelo/carrito.php";
    require_once __DIR__ . "/../Modelo/producto.php";
    class CompraControl{

        public function index(){
            if (GeneralControl::V_Sesion("usuario") || GeneralControl::V_Sesion("admin")){
                if (GeneralControl::V_Sesion("usuario")) {
                    $iduser=$_SESSION['usuario']['ID'];
                } else {
                    $iduser=$_SESSION['admin']['ID'];
                }
                
                $compras=new Venta();
                $compras->setIdUsuario($iduser);
                $mis_compras=$compras->ver_venta_usuario();
                require_once "front/Vista/MisCompras.php";
            } else {
                header("loader: ".url_index);
            }

        }

        public function ver_detalles(){
            if (!GeneralControl::V_Sesion("usuario")){
                header("location: ".url_index);
            }      
        }

        public function confirmar_compra(){
            if (!GeneralControl::V_Sesion("usuario")){
                header("location: ".url_index."usuario/index");
            } 
            require_once "front/Vista/compra.php";    
        }

        public function registrar_compra(){
            if (GeneralControl::V_Sesion("usuario") || GeneralControl::V_Sesion("admin")){

                if (GeneralControl::V_Sesion("usuario")) {
                    $iduser=$_SESSION['usuario']['ID'];
                } else {
                    $iduser=$_SESSION['admin']['ID'];
                }

                if(isset($_SESSION['link_espera']) ){
                    unset($_SESSION['link_espera']);
                }
                
                    
                $carrito=new Carrito($_SESSION['carrito']);
                $compra=new Venta(); 
                $monto=$carrito->calcular_monto_total();
                $compra->setIdUsuario($iduser);
                $compra->setMonto($monto);
                $compra->setListaProductos($_SESSION['carrito']);
                $prod=new Producto();
                $accion=$compra->registrar($prod);

                if ($accion) {
                    unset($_SESSION['carrito']);
                    $_SESSION['mensaje']="Compra registrada, Registre su envio";
                    header("location: ".url_index."compra/envio");
                } else {
                    $_SESSION['mensaje']="Ocurrio un error en la compra";
                    header("location: ".url_index."compra/envio");}

            }else{
                $_SESSION['link_espera']="location: ".url_index."compra/registrar_compra";

                $_SESSION['mensaje']="Inicie Sesion primero y se registrara su compra";
                header("location: ".url_index."usuario/index");
            }
            
        }

        public function eliminar_compra(){
            if (!GeneralControl::V_Sesion("usuario")){
                header("location: ".url_index);
            }      
        }


        public function envio(){
            if (GeneralControl::V_Sesion("usuario") || GeneralControl::V_Sesion("admin")){
                require_once "front/Vista/envio.php";
            } else {
                header("loader: ".url_index);
            }

        }

        public function registrar_envio(){
           if (GeneralControl::V_Sesion("usuario") || GeneralControl::V_Sesion("admin")){

                if($_POST){
                    
                    if (GeneralControl::V_Sesion("usuario")) {
                        $iduser=$_SESSION['usuario']['ID'];
                    } else {
                        $iduser=$_SESSION['admin']['ID'];
                    }


                    $envio= new Envio();
                    $envio->setTipo($_POST['tipo']);
                    if ($_POST['tipo']=="Local"){

                        $envio->setUsuario($iduser);
                        $envio->setVenta($_SESSION['id_pedido']);

                        $envio->setFecha($_POST['fecha']);
                        $envio->setHora($_POST['hora']);
                        $accion=$envio->registrar();

                    }else{

                        $envio->setUsuario($_SESSION['usuario']["ID"]);
                        $envio->setVenta($_SESSION['id_pedido']);

                        $envio->setFecha($_POST['fecha']);
                        $envio->setHora($_POST['hora']);
                        $envio->setDepartamento($_POST['dpto']);
                        $envio->setProvincia($_POST['prov']);
                        $envio->setDistrito($_POST['dist']);
                        $envio->setDireccion($_POST['dir']);
                        $envio->setReferencia($_POST['ref']);
                        $accion=$envio->registrar();

                    }

                    if ($accion) {
                        $_SESSION['mensaje']="Compra realizada correctamente"."///".strval($accion)."///".$_SESSION['usuario']["ID"];
                        header("location: ".url_index."compra/envio");
                    } else {
                        $_SESSION['mensaje']="Ocurrio un error en el registro del envio ".$_SESSION['usuario']["ID"]."///".$_SESSION['id_pedido']."///".$_POST['tipo']."///".strval($accion);
                        header("location: ".url_index."compra/envio");}
                    
                    
                    
                } else {
                    header("loader: ".url_index);
                }

           } else {
            header("loader: ".url_index);
        }

        }

        public function mis_envios(){

        }

        public function detalles_envio(){

        }
    }

?>
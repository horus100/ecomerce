<?php
    require_once __DIR__ . "/../Modelo/carrito.php";
    class CarritoControl{
        
        public function index(){
            if (!isset($_SESSION['carrito']) ){
                $_SESSION['carrito']=array();
            }
            require_once "front/Vista/carrito.php";
        }

        public function funcion(){
            if (!isset($_SESSION['carrito'])){
                $_SESSION['carrito']=array();
            }
            $_SESSION['mensaje']="";
            if(isset($_POST['btnAccion'])){
                switch($_POST['btnAccion']){

                    case 'Agregar':

                        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                            $id=openssl_decrypt($_POST['id'],COD,KEY);
                            // $mensaje.="OK ID CORRECTO".$ID."<br/>";
                        }else{
                            $id=false;}

                        if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                            $nombre=openssl_decrypt($_POST['nombre'],COD,KEY);
                            // $mensaje.="OK ID CORRECTO".$ID."<br/>";
                        }else{
                            $nombre=false;}

                        if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                            $cantidad=openssl_decrypt($_POST['cantidad'],COD,KEY);
                            // $mensaje.="OK CANTIDAD CORRECTO".$CANTIDAD."<br/>";
                        }else{
                            $cantidad=false;}


                        if(is_string(openssl_decrypt($_POST['precio'],COD,KEY))){
                            $precio=openssl_decrypt($_POST['precio'],COD,KEY);
                            $precio=floatval($precio);
                            // $mensaje.="OK PRECIO CORRECTO".$PRECIO."<br/>";
                        }else{
                            $precio=false;}
                        

                        if(isset($_SESSION['carrito'][intval($id)])){
                            $Objcarrito=new Carrito();
                            $Objcarrito->setProducto($id);
                            $Objcarrito->setAccionar("aumentar");
                            $Objcarrito->editar_cantidades();
                        }
                        elseif ($id && $cantidad && $precio && $nombre){
                            $Objcarrito=new Carrito();
                            $Objcarrito->setProducto($id);
                            $Objcarrito->setNombre($nombre);
                            $Objcarrito->setPrecioUnd($precio);
                            $Objcarrito->setCantidad($cantidad);
                            $Objcarrito->agregar_producto();
                            $_SESSION['mensaje']="Agregado";
                        }                        
                        else{
                            $_SESSION['mensaje']="OCURRIO UN ERROR";
                        }                 
                        break;

                    case 'Eliminar':
                        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                            $id=openssl_decrypt($_POST['id'],COD,KEY);
                            $Objcarrito=new Carrito();
                            $Objcarrito->setProducto($id);
                            $Objcarrito->setAccionar("producto");
                            $Objcarrito->borrar();
                            
                        }else{
                            $_SESSION['mensaje']="OCURRIO UN ERROR";
                        }
                        break;

                    case 'Borrar_todo':
                        $Objcarrito=new Carrito();
                        $Objcarrito->setAccionar("carrito");
                        $Objcarrito->borrar();
                        break;
                }

                header("location: ".url_index."Carrito/index");
                //require_once "front/Vista/carrito.php";
            }

        }


    }

?>
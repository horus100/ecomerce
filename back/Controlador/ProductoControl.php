<?php
    require_once __DIR__ . '/../Modelo/producto.php';
    class ProductoControl{
        public function index(){
            $productos=new Producto();
            $lista=$productos->muestra_productos();
            require_once "front/Vista/inicio.php";
        }

        public function allProductos(){
            $productos=new Producto();
            $lista=$productos->mostrar_todos_productos();
            require_once "front/Vista/allProductos.php";
        }
        public function ver_detalles(){ 
            $producto=new Producto();
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $id=openssl_decrypt($_POST['id'],COD,KEY);
                $producto->setId($id);
                $detalles=$producto->ver_producto();
                require_once "front/Vista/detalles_producto.php";
            }else{
                $detalles=false;
                require_once "front/Vista/detalles_producto.php";
            }
            
        }

        //Admin

        public function crear_producto(){
            $objctg=new Producto();
            $categorias=$objctg->mostrar_categorias();
            require_once "front/Vista/nuevo_producto.php";
        }

        public function editar_producto(){
    
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $objctg=new Producto();
                $categorias=$objctg->mostrar_categorias();
                $id=openssl_decrypt($_POST['id'],COD,KEY);
                $objctg->setId($id);
                $producto=$objctg->ver_producto();
                //print_r($producto);
                require_once "front/Vista/editar_producto.php";

            }else{
                echo "error de edicion";
            }
        }

        public function registrar_producto(){

            if($_POST){
                $producto=new Producto;
                $producto->setCategoria($_POST['categoria']);
                $producto->setNombre($_POST['nombre']);
                $producto->setShortDescripcion($_POST['Sdescrip']);
                $producto->setDescripcion($_POST['descripcion']);
                $producto->setStock($_POST['stock']);
                $producto->setPrecioUnitario($_POST['precioU']);
                $producto->setImagen($_POST['img']);
                $accion=$producto->guardar_datos();
                //echo $_POST['categoria'].$_POST['nombre'].$_POST['descripcion'].$_POST['stock'].$_POST['precioU'].$_POST['img'];
                if ($accion) {
                    $_SESSION['mensaje']=$accion;
                    header("location: ".url_index."producto&/crear_producto");
                } else {
                    $_SESSION['mensaje']="Producto no registrado";
                    header("location: ".url_index."producto&/crear_producto");
                }
                
                
            }
            
        }

        public function actualizacion_producto(){

            if($_POST){
                $producto=new Producto;
                $producto->setCategoria($_POST['categoria']);
                $producto->setNombre($_POST['nombre']);
                $producto->setShortDescripcion($_POST['Sdescrip']);
                $producto->setDescripcion($_POST['descripcion']);
                $producto->setStock($_POST['stock']);
                $producto->setPrecioUnitario($_POST['precioU']);
                $producto->setImagen($_POST['img']);
                $accion=$producto->actualizar_producto();
                //echo $_POST['categoria'].$_POST['nombre'].$_POST['descripcion'].$_POST['stock'].$_POST['precioU'].$_POST['img'];
                if ($accion) {
                    $_SESSION['mensaje']=$accion;
                    header("location: ".url_index."producto/crear_producto");
                } else {
                    $_SESSION['mensaje']="Producto no registrado";
                    header("location: ".url_index."producto/crear_producto");
                }
                
                
            }
            
        }

        public function crear_categoria(){
            require_once "front/Vista/nueva_categoria.php";
        }

        public function registrar_categoria(){

            if($_POST){
                $producto=new Producto;
                $producto->setCategoria($_POST['nombrectg']);

                $accion=$producto->registrar_categoria();
                //echo $_POST['categoria'].$_POST['nombre'].$_POST['descripcion'].$_POST['stock'].$_POST['precioU'].$_POST['img'];
                if ($accion) {
                    $_SESSION['mensaje']=$accion;
                    header("location: ".url_index."producto&/crear_categoria");
                } else {
                    $_SESSION['mensaje']="Categoria no registrada";
                    header("location: ".url_index."producto&/crear_categoria");
                }
                
                
            }
            
        }
    }

?>
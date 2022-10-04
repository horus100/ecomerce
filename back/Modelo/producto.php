<?php
require_once __DIR__ ."/Main/productoMain.php";
class Producto extends ProductoMain {

    public function guardar_datos(){

        $query="INSERT INTO productos VALUE "
             . "(NULL,'{$this->getCategoria()}','{$this->getNombre()}','{$this->getShortDescripcion()}','{$this->getDescripcion()}','{$this->getStock()}'"
             . ",'{$this->getPrecioUnitario()}','{$this->getImagen()}');";
        $accion=$this->enlace_conexion->query($query);
        if ($accion) {
            return true;
        } else {
            return $this->enlace_conexion->error;
        }  

    }

    public function editar_datos(){

        $query="UPDATE productos SET ID_Categoria='{$this->getCategoria()}',Nombre='{$this->getNombre()}',"
                . "Descripcion='{$this->getDescripcion()}',Cantidad='{$this->getStock()}',"
                . "Precio_und='{$this->getPrecioUnitario()}',Imagen='{$this->getImagen()}' WHERE ID='{$this->getId()}';";       
        $accion=$this->enlace_conexion->query($query);
        if ($accion) {
            return true;
        } else {
            return false;
        }  
    }

    public function eliminar_datos(){

            $query="DELETE FROM productos WHERE ID='{$this->getId()}';";       
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                return true;
            } else {
                return false;
            }  
    }

    public function mostrar_todos_productos($Num=null){
            if(is_null($Num)){
                  $query="SELECT * FROM productos;";    
            }else{
                  $query="SELECT * FROM productos LIMIT ".$Num;
            }       
            $accion=$this->enlace_conexion->query($query);
            if ($accion) { 
                return $accion;
            } else {
                return false;
            }      
        
    }

    public function registrar_categoria(){
            $query="INSERT INTO categoria VALUE "
            . "(NULL,'{$this->getCategoria()}');";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
            return true;
            } else {
            return false;
            }      
    }

    public function mostrar_categorias(){
            $query="SELECT * FROM categoria";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    return $accion;
            } else {
                    return false;
            }     
    }

    public function muestra_productos(){
            $query="SELECT p.*,COUNT(vp.ID) FROM productos as p INNER JOIN venta_productos as vp"
                    ." WHERE p.ID=vp.ID_Producto GROUP BY ID_Producto LIMIT 10";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    if(empty($accion) && count($accion)>9){
                          return ["Destacados",$accion];  
                    }else{
                            $var=$this->mostrar_todos_productos(10);
                            return ["Nuestros productos",$var];
                    }
                    
            } else {
                    return false;
            }  

    }
    
    public function ver_producto(){
            $query="SELECT * FROM productos WHERE ID='{$this->getId()}';";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    return $accion->fetch_assoc();
            } else {
                    return false;
            } 
    }

    public function actualizar_producto() {
        
            $query="UPDATE productos SET ('ID_Categoria'='{$this->getCategoria()}',
                                        'Nombre'='{$this->getNombre()}',
                                        'Descripcion_corta'='{$this->getShortDescripcion()}',
                                        'Descripcion_larga'='{$this->getDescripcion()}',
                                        'Cantidad'='{$this->getStock()}',
                                        'Precio_unid'='{$this->getPrecioUnitario()}',
                                        'Imagen'='{$this->getImagen}') WHERE ID='{$this->getId()}';";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    return true;
            } else {
                    return false;
            } 
    }
}
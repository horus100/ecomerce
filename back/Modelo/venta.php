<?php
require_once __DIR__ ."/Main/ventaMain.php";
class Venta extends VentaMain {
    public function registrar($prod){

        $query= "INSERT INTO ventas VALUES (NULL,'{$this->getIdUsuario()}','{$this->getMonto()}',CURDATE(),'Pendiente');";
        $accion= $this->enlace_conexion->query($query);
        
        if ($accion) {
            $id_pedido=$this->enlace_conexion->insert_id;
            if($id_pedido!= 0){
                    $registro_lista=$this->getListaProductos();
                    foreach ($registro_lista as $producto){
                        $query_lp="INSERT INTO venta_productos VALUES (NULL,{$id_pedido},'{$producto['producto']}','{$producto['cantidad']}');";
                        $accion_lp=$this->enlace_conexion->query($query_lp);
                        if ($accion_lp == false) {
                                
                                $borrar_lp="DELETE FROM venta_productos WHERE ID_Venta={$id_pedido};";
                                $this->enlace_conexion->query($borrar_lp);

                                $borrar_pedido="DELETE FROM ventas WHERE ID={$id_pedido};";
                                $this->enlace_conexion->query($borrar_pedido);

                                return false;}              
                    }
                    // Actualizar stock de producto
                    foreach ($registro_lista as $producto){
                            $prod->setId($producto['producto']);
                            $datos_producto=$prod->ver_producto(); 
                            $stock=intval($datos_producto['Cantidad']);
                            $nuevo_stock=$stock - intval($producto['cantidad']);
                            $query_uprod="UPDATE productos SET Cantidad='{$nuevo_stock}' WHERE ID='{$producto['producto']}';";
                            $accion_up=$this->enlace_conexion->query($query_uprod);
                            if ($accion_up == false) {
                                    return false;}   
                    }
                    $_SESSION['id_pedido']=$id_pedido;
                    return true;
            }else{
                            return false;}
                    
        } else {
            return false;
        }
        
    }

    public function ver_ventas(){
            
            $query="SELECT ventas.*,envios.tipo FROM ventas INNER JOIN envios WHERE ventas.ID=envios.ID_Venta ";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    //$accion=$accion->fetch_assoc();
                    return $accion->fetch_all();
            } else {
                    return $this->enlace_conexion->error;
            }
    }
    public function ver_venta_usuario(){
            
            $query="SELECT * FROM ventas WHERE ID_Cliente='{$this->getIdUsuario()}'";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    //$accion=$accion->fetch_assoc();
                    return $accion;
            } else {
                    return $this->enlace_conexion->error;
            }
    }

    public function ver_1_venta(){
            
            $query="SELECT * FROM ventas WHERE ID='{$this->getId()}'";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    $accion=$accion->fetch_assoc();
                    return $accion;
            } else {
                    return $this->enlace_conexion->error;
            }
    }


    public function ver_lista_productos(){
            
            $query="SELECT v.ID,vp.*,p.* FROM ventas as v INNER JOIN venta_productos as vp INNER JOIN productos as p"
                 . " WHERE v.ID=vp.ID_Venta AND vp.ID_Producto=p.ID AND v.ID='{$this->getId()}'";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    return $accion;
            } else {
                    return $this->enlace_conexion->error;
            }

    }

    public function actualizar_estado(){
            $query="UPDATE ventas SET Estado='{$this->getEstado()}' WHERE ID='{$this->getId()}'";
            $accion=$this->enlace_conexion->query($query);
            if ($accion) {
                    return $accion;
            } else {
                    //return $this->enlace_conexion->error;
                    return false;
            }
    }
}
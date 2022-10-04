<?php
require_once __DIR__ ."/Main/envioMain.php";
class Envio extends EnvioMain {
    
    public function registrar(){
        switch ($this->getTipo()){

            case "Local":
                $query= "INSERT INTO envios ( ID,ID_Cliente,ID_Venta,tipo,fecha,hora) "
                     . "VALUES(NULL,'{$this->getUsuario()}',"
                     . "'{$this->getVenta()}','{$this->getTipo()}','{$this->getFecha()}','{$this->getHora()}');";
                $accion=$this->enlace_conexion->query($query);
                break;

            case "Delivery":
                $query= "INSERT INTO envios(ID,ID_Cliente,ID_Venta,tipo,fecha,hora,departamento,provincia,distrito,direccion, referencia)"
                     . " VALUES(NULL,'{$this->getUsuario()}',"
                     . "'{$this->getVenta()}','{$this->getTipo()}','{$this->getFecha()}','{$this->getHora()}'"
                     . ",'{$this->getDepartamento()}','{$this->getProvincia()}','{$this->getDistrito()}'"
                     . ",'{$this->getDireccion()}','{$this->getReferencia()}');";
                $accion=$this->enlace_conexion->query($query);
                break;

        }

        if ($accion){
            return true;
        } else{
            return $this->enlace_conexion->error;
        }
    }

    public function ver_detalles(){
        $query="SELECT * FROM envios WHERE ID='{$this->getId()}'";
        $accion=$this->enlace_conexion->query($query);
        if ($accion){
            return $accion;
        } else {
            return false;
        }
    }

    public function ver_envio_venta(){
            $query="SELECT * FROM envios WHERE ID_Venta='{$this->getVenta()}'";
            $accion=$this->enlace_conexion->query($query);
            $accion=$accion->fetch_assoc();
            if ($accion){
                return $accion;
            } else {
                return false;
            }
        }

}
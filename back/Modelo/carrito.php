<?php
require_once __DIR__ ."/Main/carritoMain.php";
class Carrito extends CarritoMain {

    public function agregar_producto(){

        $precio=$this->getPrecioUnd();
        $cantidad_producto=$this->getCantidad();

        $_SESSION['carrito'][intval($this->getProducto())]=array(
            "producto"=> $this->getProducto(),
            "nombre"=> $this->getNombre(),
            "precio" => $precio ,
            "cantidad"=> $cantidad_producto ,
            "costo"=> ($precio*$cantidad_producto)
        );

    }


    public function borrar(){

        switch ($this->getAccionar()){

            case "producto":
                unset($_SESSION['carrito'][intval($this->getProducto())]);
                break;

            case "carrito":
                unset($_SESSION['carrito']);
                break;

        }
        

        

    }

    public function editar_cantidades(){

        switch ($this->getAccionar()){

            case "aumentar":
                $_SESSION['carrito'][intval($this->getProducto())]['cantidad']++;
                
                $precio=$_SESSION['carrito'][intval($this->getProducto())]['precio'];
                $cant=$_SESSION['carrito'][intval($this->getProducto())]['cantidad'];
                $costo=$precio*$cant;
                $_SESSION['carrito'][intval($this->getProducto())]['costo']=$costo;

                break;

            case "reducir":
                $_SESSION['carrito'][intval($this->getProducto())]['cantidad']--;
                if($_SESSION['carrito'][intval($this->getProducto())]['cantidad'] == 0){
                    unset($_SESSION['carrito'][intval($this->getProducto())]);
                }else{
                    $precio=$_SESSION['carrito'][intval($this->getProducto())]['precio'];
                    $cant=$_SESSION['carrito'][intval($this->getProducto())]['cantidad'];
                    $costo=$precio*$cant;
                    $_SESSION['carrito'][intval($this->getProducto())]['costo']=$costo;
                }
                break;

        }
        

    }
 

    public function calcular_monto_total(){
        $lista=$_SESSION['carrito'];
        $monto=0;
        foreach ($lista as $prod){
            $monto=$prod['costo']+$monto;
        }
        return $monto;
    }
}
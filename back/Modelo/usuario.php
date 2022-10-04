<?php
require_once __DIR__ . "/Main/usuarioMain.php";
class Usuario extends UsuarioMain {
    
    public function registrar_usuario(){
        
        $pw=password_hash($this->getPassword(), PASSWORD_DEFAULT);
        $query="INSERT INTO usuario VALUES"
            ." (NULL,'{$this->getNombre()}','{$this->getApellido()}',"
            . "'{$this->getDNI()}','{$this->getCelular()}',"
            . "'{$this->getCorreo()}','$pw','{$this->getRol()}');";
                        
        $accionar=$this->enlace_conexion->query($query);
        if ($accionar) {
            return true;
        } else {
            return false;
        }
    }

    /**Esta funcion valida la informacion del usuario.
     * Retorna los datos del usuario
     */
    public function validar()
    {
        $Email=$this->getCorreo();
        $Key=$this->getPassword();
        $query= "SELECT * FROM usuario WHERE Correo='$Email'";
        $query=$this->enlace_conexion->query($query);

        if ($query && $query->num_rows >=1){ // cambiar a que sea solo 1
            $datos=mysqli_fetch_assoc($query);
            //print_r($datos);
           if (password_verify($Key,$datos['Pw'])) {
                return $datos;
            } else {
                return false;
            }

        } else{
            return false;
        }
    }
}
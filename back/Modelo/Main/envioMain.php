<?php

    class EnvioMain{
        protected $enlace_conexion;
        protected $id;
        protected $usuario;
        protected $venta;
        protected $tipo;
        protected $fecha;
        protected $hora;
        protected $departamento;
        protected $provincia;
        protected $distrito;
        protected $direccion;
        protected $referencia;
        

        function __construct()
        {
            $this->enlace_conexion=BD::conectar();
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of usuario
         */
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */
        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        /**
         * Get the value of venta
         */
        public function getVenta()
        {
                return $this->venta;
        }

        /**
         * Set the value of venta
         *
         * @return  self
         */
        public function setVenta($venta)
        {
                $this->venta = $venta;

                return $this;
        }

        /**
         * Get the value of tipo
         */
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         *
         * @return  self
         */
        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }

        /**
         * Get the value of fecha
         */
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of hora
         */
        public function getHora()
        {
                return $this->hora;
        }

        /**
         * Set the value of hora
         *
         * @return  self
         */
        public function setHora($hora)
        {
                $this->hora = $hora;

                return $this;
        }

        /**
         * Get the value of Departamento
         */
        public function getDepartamento()
        {
                return $this->departamento;
        }

        /**
         * Set the value of Departamento
         *
         * @return  self
         */
        public function setDepartamento($departamento)
        {
                $this->departamento = $departamento;

                return $this;
        }

        /**
         * Get the value of Provincia
         */
        public function getProvincia()
        {
                return $this->provincia;
        }

        /**
         * Set the value of Provincia
         *
         * @return  self
         */
        public function setProvincia($provincia)
        {
                $this->provincia = $provincia;

                return $this;
        }

        /**
         * Get the value of Distrito
         */
        public function getDistrito()
        {
                return $this->distrito;
        }

        /**
         * Set the value of Distrito
         *
         * @return  self
         */
        public function setDistrito($distrito)
        {
                $this->distrito = $distrito;

                return $this;
        }

        /**
         * Get the value of direccion
         */
        public function getDireccion()
        {
                return $this->direccion;
        }

        /**
         * Set the value of direccion
         *
         * @return  self
         */
        public function setDireccion($direccion)
        {
                $this->direccion = $direccion;

                return $this;
        }

        /**
         * Get the value of referencia
         */
        public function getReferencia()
        {
                return $this->referencia;
        }

        /**
         * Set the value of referencia
         *
         * @return  self
         */
        public function setReferencia($referencia)
        {
                $this->referencia = $referencia;

                return $this;
        }
       
    }


?>
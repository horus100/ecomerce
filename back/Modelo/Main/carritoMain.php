<?php

    class CarritoMain{
        protected $id;
        protected $nombre;
        protected $producto;
        protected $cantidad;
        protected $precio_und;
        protected $costo;
        protected $accionar;
        


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
         * Get the value of nombre
         */
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of producto
         */
        public function getProducto()
        {
                return $this->producto;
        }

        /**
         * Set the value of producto
         *
         * @return  self
         */
        public function setProducto($producto)
        {
                $this->producto = $producto;

                return $this;
        }

        /**
         * Get the value of cantidad
         */
        public function getCantidad()
        {
                return $this->cantidad;
        }

        /**
         * Set the value of cantidad
         *
         * @return  self
         */
        public function setCantidad($cantidad)
        {
                $this->cantidad = $cantidad;

                return $this;
        }

        /**
         * Get the value of precio_und
         */
        public function getPrecioUnd()
        {
                return $this->precio_und;
        }

        /**
         * Set the value of precio_und
         *
         * @return  self
         */
        public function setPrecioUnd($precio_und)
        {
                $this->precio_und = $precio_und;

                return $this;
        }

        /**
         * Get the value of costo
         */
        public function getCosto()
        {
                return $this->costo;
        }

        /**
         * Set the value of costo
         *
         * @return  self
         */
        public function setCosto($costo)
        {
                $this->costo = $costo;

                return $this;
        }


        /**
         * Get the value of accionar
         */
        public function getAccionar()
        {
                return $this->accionar;
        }

        /**
         * Set the value of accionar
         *
         * @return  self
         */
        public function setAccionar($accionar)
        {
                $this->accionar = $accionar;

                return $this;
        }        

    }

?>
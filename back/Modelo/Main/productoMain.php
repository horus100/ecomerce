<?php

    class ProductoMain{
        protected $enlace_conexion;
        protected $id;
        protected $nombre;
        protected $categoria;
        protected $short_descripcion;
        protected $descripcion;
        protected $precio_unitario;
        protected $stock;
        protected $imagen;

        
        public function __construct()
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
         * Get the value of categoria
         */
        public function getCategoria()
        {
                return $this->categoria;
        }

        /**
         * Set the value of categoria
         *
         * @return  self
         */
        public function setCategoria($categoria)
        {
                $this->categoria = $categoria;

                return $this;
        }

        /**
         * Get the value of short_descripcion
         */
        public function getShortDescripcion()
        {
                return $this->short_descripcion;
        }

        /**
         * Set the value of short_descripcion
         */
        public function setShortDescripcion($short_descripcion): self
        {
                $this->short_descripcion = $short_descripcion;

                return $this;
        }

        /**
         * Get the value of descripcion
         */
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of precio_unitario
         */
        public function getPrecioUnitario()
        {
                return $this->precio_unitario;
        }

        /**
         * Set the value of precio_unitario
         *
         * @return  self
         */
        public function setPrecioUnitario($precio_unitario)
        {
                $this->precio_unitario = $precio_unitario;

                return $this;
        }

        /**
         * Get the value of stock
         */
        public function getStock()
        {
                return $this->stock;
        }

        /**
         * Set the value of stock
         *
         * @return  self
         */
        public function setStock($stock)
        {
                $this->stock = $stock;

                return $this;
        }

        /**
         * Get the value of imagen
         */
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

    }


?>
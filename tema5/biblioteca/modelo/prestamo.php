<?php

    class Prestamo {
        private $id;
        private $idLibro;
        private $idUsuario;
        private $fecha_i;
        private $fecha_f;
        private $estado;


        public function __construct($idLibro="",$idUsuario="",$fecha_i="",$fecha_f="",$estado="")
        {
            $this->idLibro = $idLibro;
            $this->idUsuario = $idUsuario;
            $this->fecha_i = $fecha_i;
            $this->fecha_f = $fecha_f;
            $this->estado = $estado;
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
         * Get the value of idLibro
         */ 
        public function getIdLibro()
        {
                return $this->idLibro;
        }

        /**
         * Set the value of idLibro
         *
         * @return  self
         */ 
        public function setIdLibro($idLibro)
        {
                $this->idLibro = $idLibro;

                return $this;
        }

        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        /**
         * Get the value of fecha_i
         */ 
        public function getFecha_i()
        {
                return $this->fecha_i;
        }

        /**
         * Set the value of fecha_i
         *
         * @return  self
         */ 
        public function setFecha_i($fecha_i)
        {
                $this->fecha_i = $fecha_i;

                return $this;
        }

        /**
         * Get the value of fecha_f
         */ 
        public function getFecha_f()
        {
                return $this->fecha_f;
        }

        /**
         * Set the value of fecha_f
         *
         * @return  self
         */ 
        public function setFecha_f($fecha_f)
        {
                $this->fecha_f = $fecha_f;

                return $this;
        }

        /**
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }
    }


?>
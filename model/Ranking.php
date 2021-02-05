<?php
    Class ranking{
        private $id;
        private $codUsuario;
        private $acertos;
        private $erros;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getCodUsuario()
        {
            return $this->codUsuario;
        }

        /**
         * @param mixed $codUsuario
         */
        public function setCodUsuario($codUsuario)
        {
            $this->codUsuario = $codUsuario;
        }

        /**
         * @return mixed
         */
        public function getAcertos()
        {
            return $this->acertos;
        }

        /**
         * @param mixed $acertos
         */
        public function setAcertos($acertos)
        {
            $this->acertos = $acertos;
        }

        /**
         * @return mixed
         */
        public function getErros()
        {
            return $this->erros;
        }

        /**
         * @param mixed $erros
         */
        public function setErros($erros)
        {
            $this->erros = $erros;
        }
    }
?>
<?php
    Class usuario{
        private $id;
        private $nome;
        private $senha;

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
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        /**
         * @return mixed
         */
        public function getSenha()
        {
            return $this->senha;
        }

        /**
         * @param mixed $senha
         */
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }
    }

?>
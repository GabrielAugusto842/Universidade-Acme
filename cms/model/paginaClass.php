
<?php

    class Pagina{

        private $idPagina;
        private $nome;

        public function getIdPagina(){
            return $this->idPagina;
        }

        public function setIdPagina($idPagina){
            $this->idPagina = $idPagina;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
    }
?>
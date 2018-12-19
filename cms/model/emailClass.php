<?php

    class Email{
        
        private $idEmail;   
        private $remetente;   
        private $destinatario; 
        private $assunto;
        private $mensagem;
        
        public function __construct(){
            
            require_once("dao/emailDAO.php");
        }
        
        public function getIdEmail(){
            return $this->idEmail;
        }

        public function setIdEmail($idEmail){
            $this->idEmail = $idEmail;
        }

        public function getRemetente(){
            return $this->remetente;
        }

        public function setRemetente($remetente){
            $this->remetente = $remetente;
        }

        public function getDestinatario(){
            return $this->destinatario;
        }

        public function setDestinatario($destinatario){
            $this->destinatario = $destinatario;
        }

        public function getAssunto(){
            return $this->assunto;
        }

        public function setAssunto($assunto){
            $this->assunto = $assunto;
        }

        public function getMensagem(){
            return $this->mensagem;
        }

        public function setMensagem($mensagem){
            $this->mensagem = $mensagem;
        }
    }

?>
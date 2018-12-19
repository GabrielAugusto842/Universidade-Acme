<?php

    class controllerEmail{
        
        public function __construct(){
            @session_start();
            require_once($_SESSION['require']."cms/model/dao/emailDAO.php");
            require_once($_SESSION['require']."cms/model/emailClass.php");
        }
        
        public function enviarEmail(){
            
            $email = new Email();
                        
            $email->setAssunto($_POST["txtAssunto"]);
            if(isset($_POST["txtDestinatario"])){
                $email->setDestinatario($_POST["txtDestinatario"]);
            }
            $email->setRemetente("lucassm05@gmail.com");
            $email->setMensagem($_POST["txtCorpo"]);
            
            $emailDAO = new emailDAO();
            
           mail($email->getDestinatario(),$email->getAssunto() , $email->getMensagem() , $email->getRemetente());
            
            $emailDAO->insert($email);
            
        }
        
    }


?>
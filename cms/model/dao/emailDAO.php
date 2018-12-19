<?php
    
    class emailDAO{
        
        public function __construct(){
            
            require_once("bdClass.php");
            
        }
        
         public function insert(Email $email){

            //TODO: fazer insert na tabela de relação entre nivel e pagina
            $sql = "insert into tbl_email(remetente, destinatario, assunto, mensagem) values('".$email->getRemetente()."','".$email->getDestinatario()."', '".$email->getAssunto()."','".$email->getMensagem()."')";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                echo("Inserido com sucesso");
            else
                echo("Erro no script de Insert");

            $conex->closeDatabase();

        }

        public function delete($id){
            $sql = "delete from tbl_email where idEmail =".$id;
            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                echo("excluido com sucesso");
            else
                echo("Erro no script de delete");

            $conex->closeDatabase();
        }
        
    }

?>
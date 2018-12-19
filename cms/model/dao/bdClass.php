<?php
/*
    Projeto: MVC CMS Universidade ACME
    Autor: Gustavo
    Data: 29/08/2018
    Objetivo:Criar a classe de conexão com o MySql

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/
    class conexaoMySql{
        private $server;
        private $user;
        private $password;
        private $databaseName;

        public function __construct(){
            $this->server = "localhost";
            $this->user =  $_SERVER['SERVER_NAME'] == 'www.alcateck.tk' ? "lobo" : "root";
            $this->password = $_SERVER['SERVER_NAME'] == 'www.alcateck.tk' ? "lobo123" :"";
            $this->databaseName = "db_uniacme";
        }

        //Estabelece a conexão com o BD
        public function conectDatabase(){
            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->databaseName,$this->user,$this->password);
                return $conexao;
            }catch(PDOException $Erro){
                echo("Erro ao tentar se conectar ao Banco de Dados
                <br>
                Linha:".$Erro->getLine().
                "<br>
                Mensagem:".$Erro->getMessage()
                );
            }

        }

        //Fecha a conexão com o BD
        public function closeDatabase(){
           $conexao = null;
        }
    }

?>

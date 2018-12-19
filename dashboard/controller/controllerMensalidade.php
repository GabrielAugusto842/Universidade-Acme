<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 22/11/2018
    Objetivo: Controlar as ações do formulário de mensalidades

    Editado por: Gabriel
    Data  da alteração: 22/11/2018
    Conteudo alterado: listarByAluno

*/
class controllerMensalidade {

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/mensalidadeClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/mensalidadeDAO.php");
    }

    //Listar todas as mensalidades registradas de um aluno
    public function listarMensalidadeByAluno($matricula){

        //Instancia da model Mensalidade
        $mensalidadeDAO = new MensalidadeDAO();
        //Chama o método para selecionar todos os registros
        $listMensalidade = $mensalidadeDAO->selectByAluno($matricula);
        //Retorna o resultado obtido para a view
        return $listMensalidade;

    }

}

?>

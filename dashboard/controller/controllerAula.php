<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 22/11/2018
    Objetivo: Controlar as ações do formulário de aulas

    Editado por: Gabriel
    Data  da alteração: 22/11/2018
    Conteudo alterado: listarByAluno

*/
class controllerAula {

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/aulaClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/aulaDAO.php");
    }

    //Listar todas as aulas registradas de um aluno
    public function listarAulaByAluno($matricula){

        //Instancia da model Aula
        $aulaDAO = new AulaDAO();
        //Chama o método para selecionar todos os registros
        $listAula = $aulaDAO->selectByAluno($matricula);
        //Retorna o resultado obtido para a view
        return $listAula;

    }

}

?>

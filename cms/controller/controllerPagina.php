<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 29/08/2018
    Objetivo: Enviar para view as informções da página

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/
class controllerPagina{

  //Construtor
    public function __construct(){
        require_once($_SESSION['require']."cms/model/paginaClass.php");
        require_once($_SESSION['require']."cms/model/dao/paginaDAO.php");
    }

    //Listar todos os contatos registrados
    public function listarPagina(){

        $paginaDAO = new PaginaDAO();
        $listPagina = $paginaDAO::selectAll();

        //Retorna o resultado obtido para a view
        return $listPagina;

    }

}

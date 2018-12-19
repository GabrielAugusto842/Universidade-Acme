<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 19/09/2018
    Objetivo: Controlar as ações da tabela de avaliações

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class controllerAvaliacaoPrimaria {

    //Constructor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/dao/avaliacaoDAO.php");
        require_once($_SESSION['require']."cms/model/avaliacaoClass.php");
    }

	public function inserirAvaliacao(){
		if ($_SERVER['REQUEST_METHOD']=="POST") {
            
            $avaliacaoClass = new Avaliacao();
			
            $avaliacaoClass->setNome($_POST['txtNome']);
            $avaliacaoClass->setEmail($_POST['txtEmail']);
		  	$avaliacaoClass->setComentario($_POST['txtComentario']);
		  	$avaliacaoClass->setAvaliacao($_POST['star']);
		  	$avaliacaoClass->setData(date('Y-m-d'));
			$avaliacaoClass->setStatus(0);
            $avaliacaoDAO = new AvaliacaoDAO();
            $avaliacaoDAO->insert($avaliacaoClass);
		}
	}
    //busca avaliações cadastradas
    public function buscarAvaliacao($id){
        $avaliacaoDAO = new avaliacaoDAO();
        $list = $avaliacaoDAO::SelectById($id);
        @$list->setData(date('d/m/Y',strtotime($list->getData())));
        return $list;
    }

    //exclui uma avaliação cadastrada
    public function excluirAvaliacao($id){
        $avaliacaoDAO = new avaliacaoDAO();
        $avaliacaoDAO::delete($id);
    }

    public function listarAvaliacao(){
        $avaliacaoDAO = new avaliacaoDAO();
        $listAvaliacao = $avaliacaoDAO::selectAll();
        return $listAvaliacao;
    }
	
	public function ativarAvaliacao($id, $status) {
		$avaliacaoDAO = new avaliacaoDAO();
		$avaliacaoDAO->active($id, $status);
	}

}


?>

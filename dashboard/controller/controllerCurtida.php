<?php
/*
    Projeto: Universidade ACME 
    Autor: Alcateck
    Data: 12/11/2018
    Objetivo: Controlar as ações de curtidas no forum   

    Editado por: 
    Data  da alteração: 
    Conteudo alterado: criação da controller

*/

class controllerCurtida {
	//Construtor
	public function __construct(){
		@session_start();
		require_once($_SESSION['require']."dashboard/model/curtidaClass.php");
		require_once($_SESSION['require']."dashboard/model/dao/curtidaDAO.php");
	}

	public function inserirCurtida($matriculaAluno, $idPost){
		//Verifica se os dados estão sendo enviados via POST pelo formulário
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			//Instancia da Classe Curtida da Model e preenche atributos
			$curtidaClass = new Curtida();

			$curtidaClass->setMatriculaAluno($matriculaAluno);
			$curtidaClass->setIdPost($idPost);

			$curtidaDAO = new CurtidaDAO();
			$curtidaDAO->insert($curtidaClass);
		}
	}

	public function buscarCurtida($id){
		$curtidaDAO = new CurtidaDAO();

		$list = $curtidaDAO->selectByid($id);

		return $list;
	}

	public function excluirCurtida($id){

		$curtidaDAO = new CurtidaDAO();

		//chama o metódo delete da classe curtida
		$curtidaDAO->delete($id);
	}

	public function listarCurtida($idCurtida){

		$curtidaDAO = CurtidaDAO();

		$listCurtida = $curtidaDAO->selectAll($idCurtida);

		return $listCurtida;

	}
	
	//Listar quantidade de curtidas registrada no post
	public function buscarCurtidaByPost($idPost) {
		$curtidaDAO = new CurtidaDAO();

		$list = $curtidaDAO->selectByPost($idPost);

		return $list;
	}
	
}

?>
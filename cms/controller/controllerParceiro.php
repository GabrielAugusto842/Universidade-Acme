<?php

	/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 17/10/2018
    Objetivo: Controlar as ações do parceiro

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class controllerParceiro{
	
	public function __construct(){
          @session_start();
          require_once($_SESSION['require']."cms/model/parceiroClass.php");
          require_once($_SESSION['require']."cms/model/dao/parceiroDAO.php");
      }
	
	
	public function inserirParceiro(){
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$parceiroClass = new Parceiro();
			$parceiroClass->setNome($_POST['txtNome']);
			$parceiroClass->setDesc($_POST['txtDesc']);
			$parceiroClass->setImg($_POST['txtFoto']);
			
			$parceiroDAO = new ParceiroDAO();
			$parceiroDAO::Insert($parceiroClass);
			
		}
		
	}
	
	
	public function atualizarParceiro($id){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){	
			
			$parceiroClass = new Parceiro();
			$parceiroClass->setNome($_POST['txtNome']);
			$parceiroClass->setDesc($_POST['txtDesc']);
			$parceiroClass->setImg($_POST['txtFoto']);
			$parceiroClass->setIdParceiro($id);
			
			$parceiroDAO = new ParceiroDAO();
			$parceiroDAO::Update($parceiroClass);
				
			
				
		}
		
	}
	
	public function buscarParceiro($id){
		
		$parceiroDAO = new ParceiroDAO();
		
		$listParceiro = $parceiroDAO::SelectById($id);
		
		return $listParceiro;
		
	}
	
	
	public function excluirParceiro($id){
		
		$parceiroDAO = new ParceiroDAO();
		$parceiroDAO::Delete($id);

	}
	
	public function listarParceiro(){
		
		$parceiroDAO = new ParceiroDAO();
		$listP = $parceiroDAO::SelectAll();
		
		return $listP;
		
		
	}
	
}

?>
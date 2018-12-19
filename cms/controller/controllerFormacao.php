<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 29/08/2018
    Objetivo: Controlar as ações de formação

    Editado por:
    Data  da alteração:
    Conteudo alterado:


*/

class controllerFormacao{

      public function __construct(){
      @session_start();
      require_once($_SESSION['require']."cms/model/formacaoClass.php");
      require_once($_SESSION['require']."cms/model/dao/formacaoDAO.php");
      }

      public function inserirFormacao(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

          $formacaoClass = new Formacao();
          $formacaoClass->setNome($_POST['txtNome']);
          $formacaoClass->setDesc($_POST['txtDesc']);

          $formacaoDAO = new FormacaoDAO();
          $formacaoDAO::insert($formacaoClass);

        }
      }

		public function atualizarFormacao($id){
			if($_SERVER['REQUEST_METHOD']=='POST'){
			
				$formacaoClass = new Formacao();
				
				$formacaoClass->setIdFormacao($id);
				$formacaoClass->setNome($_POST['txtNome']);
				$formacaoClass->setDesc($_POST['txtDesc']);
				
				$formacaoDAO = new FormacaoDAO();
				$formacaoDAO::update($formacaoClass);
			}		
					
		}
	
		public function buscarFormacao($id){
			
			$formacaoDAO = new FormacaoDAO();
			
			$list = $formacaoDAO::SelectById($id);
			
			return $list;
			
			
		}

		public function excluirFormacao($id){
			$formacaoDAO = new FormacaoDAO();
			$formacaoDAO::Delete($id);
			
		}
	
		public function listarFormacao(){
			
			$formacaoDAO = new FormacaoDAO();
			$listFormacao = $formacaoDAO::SelectAll();
			
			return $listFormacao;
			
			
		}

}










?>

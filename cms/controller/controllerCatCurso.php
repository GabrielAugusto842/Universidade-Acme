<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 09/10/2018
    Objetivo: Controlar as ações da categoria do curso

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class controllerCatCurso{

      public function __construct(){
      @session_start();
      require_once($_SESSION['require']."cms/model/catCursoClass.php");
      require_once($_SESSION['require']."cms/model/dao/catCursoDAO.php");
      }
	
	public function inserirCatCurso(){
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
			$catCursoClass = new CatCurso();
			$catCursoClass->setNome($_POST['txtNome']);
			
			$catCursoDAO = new CatCursoDAO();
			$catCursoDAO::insert($catCursoClass);
			
		}
		
	}
	
	public function atualizarCatCurso($id){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			
			$catCursoClass = new CatCurso();
            $catCursoClass->setIdCategoriaCurso($id);
			$catCursoClass->setNome($_POST['txtNome']);
			
			$catCursoDAO = new CatCursoDAO();
			$catCursoDAO::Update($catCursoClass);
		}
	}
	
	public function buscarCatCurso($id){
		
		$catCursoDAO = new CatCursoDAO();
		$listCat = $catCursoDAO::SelectById($id);
		return $listCat;
		
	}
	
	public function excluirCatCurso($id){
		
		$catCursoDAO = new CatCursoDAO();
		$catCursoDAO::Delete($id);
		
	}
	
	public function listarCatCurso(){
		
		$catCursoDAO = new CatCursoDAO();
		$listCat = $catCursoDAO::selectAll();
		
		return $listCat;
		
	}
	
}


?>
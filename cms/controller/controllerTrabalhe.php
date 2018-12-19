<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 20/10/2018
    Objetivo: Controlar as ações do formulário de Trabalhe conosco

    Editado por:
    Data  da alteração:
    Conteudo alterado:
	
	*Em alteração por gabriel*

*/

class controllerTrabalhe {
	//Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/trabalheClass.php");
        require_once($_SESSION['require']."cms/model/dao/trabConoscoDAO.php");
    }
	
	//Inserir Novo Trabalhe conosco
    public function inserirTrabConosco(){
       //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

           	//Instancia da Classe TrabConosco da Model
           	$trabalheClass = new TrabConosco();

           	//Guarda os dados retirados do FORM nos atributos da classe trabConosco
			$trabalheClass->setCurriculo($_POST['txtArquivo']);
           	$trabalheClass->setNome($_POST['txtNome']);
           	$trabalheClass->setEmail($_POST['txtEmail']);
           	$trabalheClass->setDtNasc($_POST['txtDtNasc']);
           	$trabalheClass->setTelefone($_POST['txtTelefone']);
           	$trabalheClass->setDesc($_POST['txtDesc']);

            //instancia de Usuario DAO e chamada do método insert
           	$trabalheDAO = new TrabConoscoDAO();
           	$trabalheDAO::Insert($trabalheClass);

       }
    }
	
	//Busca o trabalhe conosco existente
    public function buscarTrabConosco($id){

        $trabConoscoDAO = new TrabConoscoDAO();

        $list =  $trabConoscoDAO::SelectById($id);

        return $list;
    }

    //Excluir trabalheConosco
    public function excluirTrabConosco($id){

        $trabConoscoDAO = new TrabConoscoDAO();

        //chama o metódo  delete da classe usuario
        $trabConoscoDAO->delete($id);
	
    }

    //Listar todos os trabalhe conosco registrados
    public function listarTrabConosco(){

        //Instancia  da model TrabConosco
         $trabConoscoDAO = new TrabConoscoDAO();

        //Chama o método para selecionar todos os registros
        $listTrabConosco = $trabConoscoDAO::selectAll();

        //Retorna o resultado obtido para a view
        return $listTrabConosco;

    }
	
}
?>
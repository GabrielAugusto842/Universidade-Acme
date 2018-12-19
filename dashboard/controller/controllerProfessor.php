<?php
/*
Projeto: Universidade ACME
    Autor: alcateck
    Data: 22/11/2018
    Objetivo: Controller Professor

    Editado por: 
    Data  da alteração: 
    Conteudo alterado: 

*/

class controllerProfessor{
	@session_start(); 
	require_once($_SESSION['require']."dashboard/model/professorClass.php");
	require_once($_SESSION['require']."dashboard/model/dao/professorDAO.php");
}

//Atualizar Professor existente
    public function atualizarProfessor($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

         //Instancia da Classe Professor da Model e preenche atributos
          $professorClass = new professor();
		  $professorClass->setMatriculaProfessor($id);
		  $professorClass->setNome('txtNome');
		  $professorClass->setCpf('txtCpf');
		  $professorClass->setTelefone('txtTelefone');
		  $professorClass->setCelular('txtCelular');

            //instancia de Professor DAO e chamada do método UPDATE

            $professorDAO = new professorDAO();
            $professorDAO::Update($professorClass);


       }

    }

     //Busca o Professor existente
    public function buscarProfessor($id){

        $professorDAO = new professorDAO();

        $list =  $professorDAO->selectById($id);

        return $list;
    }

    //Excluir Professor
    public function excluirProfessor($id){

        $professorDAO = new professorDAO();

        //chama o metódo delete da classe aluno
        $professorDAO->delete($id);
    }

    //Listar todos os Professor registrados
    public function listarProfessor(){

        //Instancia  da model Aluno
        $professorDAO = new professorDAO();

        //Chama o método para selecionar todos os registros
        $listProfessor = $professorDAO::selectAll();

        //Retorna o resultado obtido para a view
        return $listProfessor;

    }
?>
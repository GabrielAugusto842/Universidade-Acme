<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 12/11/2018
    Objetivo: Controlar as ações do formulário de posts

    Editado por: Gabriel
    Data  da alteração: 12/11/2018
    Conteudo alterado: insert

*/
class controllerComentario{

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/comentarioClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/comentarioDAO.php");
    }

//    Inserir novo Comentario
    public function inserirComentario($matricula,$idPost){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            //Instancia da classe comentario da Model
            $comentarioClass = new Comentario();

//            Guarda os dados retirados do FORM nos atributos da classe comentario
            $comentarioClass->setMatriculaAluno($matricula);
            $comentarioClass->setIdPost($idPost);
		  	$comentarioClass->setComentario($_POST['txtComentario']);

//            Instancia de Comentario DAO e chamada do método insert
            $comentarioDAO = new comentarioDAO();
            $comentarioDAO->insert($comentarioClass);
        }
    }
	
	//Listar todos os comentarios registrados
    public function listarComentario($idPost){

        //Instancia  da model Comentario
        $comentarioDAO = new comentarioDAO();

        //Chama o método para selecionar todos os registros
        $listComentario = $comentarioDAO->selectAll($idPost);

        //Retorna o resultado obtido para a view
        return $listComentario;

    }
	
}

?>

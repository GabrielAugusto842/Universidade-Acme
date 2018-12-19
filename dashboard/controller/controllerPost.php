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
class controllerPost{

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/postClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/postDAO.php");
    }

    //Inserir novo Post
    public function inserirPost($matricula,$idRede){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            //Instancia da classe Post da Model
            $postClass = new Post();

            //Guarda os dados retirados do FORM nos atributos da classe Post
            $postClass->setMatriculaAluno($matricula);
            $postClass->setIdRede($idRede);
		  	$postClass->setTexto($_POST['txtTexto']);
            $postClass->setMidia("");

            //Instancia de Post DAO e chamada do método insert
            $postDAO = new PostDAO();
            $postDAO->insert($postClass);
        }
    }

    //Atualizar Post existente
    public function atualizarPost($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

         //Instancia da Classe Post da Model e preenche atributos
           $postClass = new Post();

           $postClass->setIdPost($id);
           $postClass->setMatriculaAluno($matricula);
           $postClass->setIdRede($idRede);
           $postClass->setTexto($_POST['txtTexto']);
           $postClass->setMidia('');

            //instancia de Post DAO e chamada do método UPDATE

            $postDAO = new PostDAO();
            $postDAO::Update($postClass);

       }

    }

    //Busca o post existente
    public function buscarPost($id){

        $postDAO = new PostDAO();

        $list = $postDAO->selectById($id);

        return $list;
    }

    //Excluir aluno
    public function excluirPost($id){

        $postDAO = new PostDAO();

        //chama o metódo delete da classe post
        $postDAO->delete($id);
    }

    //Listar todos os posts registrados
    public function listarPost($idRede){

        //Instancia da model Post
        $postDAO = new PostDAO();
        //Chama o método para selecionar todos os registros
        $listPost = $postDAO->selectAll($idRede);
        //Retorna o resultado obtido para a view
        return $listPost;

    }

}

?>

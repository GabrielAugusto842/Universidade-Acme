<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 01/10/2018
    Objetivo: Controlar as ações do formulário de noticias

    Editado por:
    Data  da alteração:
    Conteudo alterado:

    Em alteração por Gabriel

*/
class controllerNoticia{


    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/noticiaClass.php");
        require_once($_SESSION['require']."cms/model/dao/noticiaDAO.php");
    }
    //Inserir Nova noticia
    public function inserirNoticia(){
       //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

           //Instancia da Classe Noticia da Model
            $noticiaClass = new Noticia();

            $noticiaClass->setTitulo($_POST['txtTitulo']);
            $noticiaClass->setDesc($_POST['txtDesc']);
            $noticiaClass->setFoto($_POST['txtFoto']);
            $noticiaClass->setInicio($_POST['txtInicio']);
            $noticiaClass->setTermino($_POST['txtTermino']);
            //instancia de Noticia DAO e chamada do método insert
            $noticiaDAO = new NoticiaDAO();
            $noticiaDAO->insert($noticiaClass);
       }
    }

    //Atualizar Noticia existente
    public function atualizarNoticia($id){
        //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

         //Instancia da Classe Noticia da Model e preenche atributos
           $noticiaClass = new Noticia();

           $noticiaClass->setIdNoticia($id);
           $noticiaClass->setTitulo($_POST['txtTitulo']);
           $noticiaClass->setDesc($_POST['txtDesc']);
           $noticiaClass->setFoto($_POST['txtFoto']);
           $noticiaClass->setInicio($_POST['txtInicio']);
           $noticiaClass->setTermino($_POST['txtTermino']);

            //instancia de Noticia DAO e chamada do método UPDATE

            $noticiaDAO = new NoticiaDAO();
            $noticiaDAO->update($noticiaClass);

       }

    }

    //Busca o noticia existente
    public function buscarNoticia($id){

        $noticiaDAO = new NoticiaDAO();

        $list =  $noticiaDAO->selectById($id);

        return $list;
    }

    //Excluir noticia
    public function excluirNoticia($id){
         $noticiaDAO = new NoticiaDAO();
        //chama o metódo  delete da classe noticia
         $noticiaDAO->delete($id);
    }

    //Listar todas as noticias registrados
    public function listarNoticia(){

        //Instancia  da model Noticia
         $noticiaDAO = new NoticiaDAO();

        //Chama o método para selecionar todos os registros
        $listNoticia = $noticiaDAO->selectAll();

        //Retorna o resultado obtido para a view
        return $listNoticia;

    }

}

?>

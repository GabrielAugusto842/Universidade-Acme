<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 27/09/2018
    Objetivo: Controlar as ações do formulário de eventos

    Editado por:
    Data  da alteração:
    Conteúdo alterado:
*/

class controllerEvento{

    //Constructor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/eventoClass.php");
        require_once($_SESSION['require']."cms/model/dao/eventoDAO.php");
    }

    //Inserir novo Evento
    public function inserirEvento(){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            //Instancia da classe Evento da Model
            $eventoClass = new Evento();

            //Guarda os dados retirados do FORM nos atributos da classe Evento
            $eventoClass->setIdUnidade($_POST['txtUnidade']);
            $eventoClass->setNome($_POST['txtNome']);
            $eventoClass->setDesc($_POST['txtDesc']);
		  	$eventoClass->setFoto($_POST['txtFoto']);
            $eventoClass->setInicio(str_replace("T"," ",$_POST['txtInicio']));
            $eventoClass->setTermino(str_replace("T"," ",$_POST['txtTermino']));


            //Instancia de Evento DAO e chamada do método insert
            $eventoDAO = new EventoDAO();
            $eventoDAO->insert($eventoClass);
        }
    }

    //Atualizar evento existente
    public function atualizarEvento($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            $eventoClass = new Evento();

            $eventoClass->setIdEvento($id);
            $eventoClass->setIdUnidade($_POST['txtUnidade']);
            $eventoClass->setNome($_POST['txtNome']);
            $eventoClass->setDesc($_POST['txtDesc']);
            $eventoClass->setFoto($_POST['txtFoto']);
            $eventoClass->setInicio(str_replace("T"," ",$_POST['txtInicio']));
            $eventoClass->setTermino(str_replace("T"," ",$_POST['txtTermino']));

            //Instancia de EventoDAO e chamada do método UPDATE
            $eventoDAO = new EventoDAO();
            $eventoDAO::Update($eventoClass);
        }
    }

    //Buscar o evento existente
    public function buscarEvento($id){
        $eventoDAO = new EventoDAO();
        $list = $eventoDAO::SelectById($id);
        return $list;
    }

    //Excluir evento
    public function excluirEvento($id){
        $eventoDAO = new EventoDAO();
        //chama o método delete da classe evento
        $eventoDAO->delete($id);
    }

    //Listar todos os eventos registrados
    public function listarEvento(){
        //Instancia da model evento
        $eventoDAO = new EventoDAO();
        //Chama o método para selecionar todos os registrados
        $listEvento = $eventoDAO::selectAll();
        //Retorna o resultado obtido para a view
        return $listEvento;
    }
    
     public function listar3Evento($id){
        //Instancia da model evento
        $eventoDAO = new EventoDAO();
        //Chama o método para selecionar todos os registrados
        $listEvento = $eventoDAO::select3($id);
        //Retorna o resultado obtido para a view
        return $listEvento;
    }

}
?>

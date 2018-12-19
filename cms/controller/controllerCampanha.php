<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 01/10/2018
    Objetivo: Controlar as ações do formulário de campanhas

    Editado por:
    Data  da alteração:
    Conteudo alterado:

    Em alteração por Gabriel

*/
class controllerCampanha{


    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/campanhaClass.php");
        require_once($_SESSION['require']."cms/model/dao/campanhaDAO.php");
    }

    //Atualizar Campanha existente
    public function atualizarCampanha($id){
        //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

         //Instancia da Classe Campanha da Model e preenche atributos
           $campanhaClass = new Campanha();
			
			$foto = $_POST['txtFoto'].";".$_POST['txtFoto1'].";".$_POST['txtFoto2'].";".$_POST['txtFoto3'];

           $campanhaClass->setIdCampanha($id);
           $campanhaClass->setFoto($foto);

            //instancia de Campanha DAO e chamada do método UPDATE

            $campanhaDAO = new CampanhaDAO();
            $campanhaDAO->update($campanhaClass);

       }

    }
}

?>

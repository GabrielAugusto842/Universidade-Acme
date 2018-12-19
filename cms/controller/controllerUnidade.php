<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 03/10/2018
    Objetivo: Controlar as ações do formulário de unidade

    Editado por:
    Data  da alteração:
    Conteudo alterado:

    *Em alteração por Gabriel*

*/
class controllerUnidade{

    //Construtor
    public function __construct(){
		@session_start();
        require_once($_SESSION['require']."cms/model/unidadeClass.php");
        require_once($_SESSION['require']."cms/model/dao/unidadeDAO.php");
    }
    //Inserir nova unidade
    public function inserirUnidade(){

      if($_SERVER['REQUEST_METHOD']=='POST'){

         //Instancia da Classe Unidade da Model
         $unidadeClass = new Unidade();


         //Guarda os dados retirados do FORM nos atributos da classe unidade
         $unidadeClass->setFoto($_POST['txtFoto']);
         $unidadeClass->setNome($_POST['txtNome']);
         $logradouro = $_POST['txtLogradouro'];
         $complemento = $_POST['txtComplemento'];
         $numero = $_POST['txtNumero'];
         $bairro = $_POST['txtBairro'];
         $cep = $_POST['txtCep'];
         $estado = $_POST['slcEstado'];
         $cidade = $_POST['slcCidade'];
         $endereco = $logradouro.", ".$numero.", ".$complemento.", ".$bairro.", ".$cep.", ".$estado.", ".$cidade;
         $unidadeClass->setEndereco($endereco);
         $unidadeClass->setDesc($_POST['txtDesc']);

         $unidadeDAO = new unidadeDAO();
         $unidadeDAO::Insert($unidadeClass);



     }

    }

    //Atualizar Contato existente
    public function atualizarUnidade($id){
      if($_SERVER['REQUEST_METHOD']=='POST'){

       //Instancia da Classe Unidade da Model e preenche atributos
         $unidadeClass = new Unidade();

         $unidadeClass->setIdUnidade($id);
         $unidadeClass->setFoto($_POST['txtFoto']);
         $unidadeClass->setNome($_POST['txtNome']);
         $logradouro = $_POST['txtLogradouro'];
         $complemento = $_POST['txtComplemento'];
         $numero = $_POST['txtNumero'];
         $bairro = $_POST['txtBairro'];
         $cep = $_POST['txtCep'];
         $estado = $_POST['slcEstado'];
         $cidade = $_POST['slcCidade'];
         $endereco = $logradouro.", ".$numero.", ".$complemento.", ".$bairro.", ".$cep.", ".$estado.", ".$cidade;
         $unidadeClass->setEndereco($endereco);
         $unidadeClass->setDesc($_POST['txtDesc']);

         $unidadeDAO = new unidadeDAO();
         $unidadeDAO::update($unidadeClass);
    }

	}

    //Busca a unidade existente
    public function buscarUnidade($id){

      $unidadeDAO = new unidadeDAO();

      $list =  $unidadeDAO->SelectById($id);

      return $list;

    }

    //Excluir unidade
    public function excluirUnidade($id){

		$unidadeDAO = new UnidadeDAO();

		$unidadeDAO->delete($id);

    }

    //Listar todas as unidades registradas
    public function listarUnidade(){

      $unidadeDAO = new UnidadeDAO();

      $listUnidade = $unidadeDAO->selectAll();

      return $listUnidade;

    }

}

?>

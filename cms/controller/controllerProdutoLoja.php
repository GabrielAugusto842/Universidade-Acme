<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 29/08/2018
    Objetivo: Controlar as ações do formulário de PDRODUTOS DA LOJA

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/
class controllerProdutoLoja{


    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/produtoLojaClass.php");
        require_once($_SESSION['require']."cms/model/dao/produtoLojaDAO.php");


    }

    public function inserirProdutoLoja(){
       //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){
		
        	$produtoLojaClass = new ProdutoLoja();
        	$produtoLojaClass->setTitulo($_POST['txtTitulo']);
           	$produtoLojaClass->setDesc($_POST['txtDesc']);
			$preco2 = $_POST['txtPreco'];
			$preco1 = str_replace("R$", "", $preco2);
			$preco = str_replace(",", ".", $preco1);
           	$produtoLojaClass->setPreco($preco);
           	$produtoLojaClass->setImg($_POST['txtFoto']);
           	$produtoLojaClass->setIdCategoria($_POST['txtCatProduto']);

           	$produtoLojaDAO = new ProdutoLojaDAO();
           	$produtoLojaDAO::Insert($produtoLojaClass);

       }
    }

    //Atualizar Contato existente
    public function atualizarProdutoLoja($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){

           	$produtoLojaClass = new ProdutoLoja();
           	$produtoLojaClass->setIdProduto($id);
           	$produtoLojaClass->setTitulo($_POST['txtTitulo']);
           	$produtoLojaClass->setDesc($_POST['txtDesc']);
           	$preco2 = $_POST['txtPreco'];
			$preco1 = str_replace("R$", "", $preco2);
			$preco = str_replace(",", ".", $preco1);
           	$produtoLojaClass->setPreco($preco);
           	$produtoLojaClass->setImg($_POST['txtFoto']);
           	$produtoLojaClass->setIdCategoria($_POST['txtCatProduto']);

           	$produtoLojaDAO = new ProdutoLojaDAO();
           	$produtoLojaDAO::Update($produtoLojaClass);

       }

    }

    //Busca o usuario existente
    public function buscarProdutoLoja($id){

        $produtoLojaDAO = new ProdutoLojaDAO();

        $list =  $produtoLojaDAO::SelectById($id);

        return $list;
    }

    //Excluir contato
    public function excluirProdutoLoja($id){
         $produtoLojaDAO = new ProdutoLojaDAO();
         $produtoLojaDAO::Delete($id);
    }

    public function listarProdutoLoja(){

        $produtoLojaDAO = new ProdutoLojaDAO();
        $listProdutoLoja = $produtoLojaDAO::selectAll();

        //Retorna o resultado obtido para a view
        return $listProdutoLoja;

    } 
    
    public function listarProdutoLojaPorCat($idcat){

        $produtoLojaDAO = new ProdutoLojaDAO();
        $listProdutoLoja = $produtoLojaDAO::selectByCat($idcat);

        //Retorna o resultado obtido para a view
        return $listProdutoLoja;

    }



}

?>

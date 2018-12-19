<?php

class controllerSobre{
	
	public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/conteudoClass.php");
        require_once($_SESSION['require']."cms/model/dao/conteudoDAO.php"); 
	}
    
    public function buscarSobre($id){
        $conteudoDAO = new conteudoDAO();
        $list = $conteudoDAO->selectById($id);
        return $list;
    }
    
    
    public function atualizarInicio($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtSubtitulo"].";".$_POST["txtSubImg1"].";".$_POST["txtDescImg1"].";".$_POST["txtSubImg2"].";".$_POST["txtDescImg2"];
            $txtFoto =  $_POST["txtFoto"].";".$_POST["txtFoto1"].";".$_POST["txtFoto2"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Sobre");
            $contedo->setSessao("Inicio");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($txtFoto);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
    
    
    public function atualizarNossaHistoria($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtSubTitulo"].";".$_POST["txtDesc"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Sobre");
            $contedo->setSessao("Nossa Historia");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    } 
    
    public function atualizarNossaFilosofia($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtSubTitulo"].";".$_POST["txtDesc"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Sobre");
            $contedo->setSessao("Nossa Filosofia");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
    
  public function atualizarParceiros($id){
    //Verifica se os dados estão sendo enviados via POST pelo formulário
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        //Instancia da classe Evento da Model e preenche atributos

        $txtConteudo = $_POST["txtTitulo"];

        $contedo = new Conteudo();

        $contedo->setIdConteudo($id);
        $contedo->setPagina("Sobre");
        $contedo->setSessao("Parceiros");
        $contedo->setConteudo($txtConteudo);
        $contedo->setFoto($_POST["txtFoto"]);

        $conteudoDAO = new conteudoDAO();
        $conteudoDAO->update($contedo);

        echo($txtConteudo);

    }
}	
}

?>
<?php

class controllerTrabalheConosco{
	
	public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/conteudoClass.php");
        require_once($_SESSION['require']."cms/model/dao/conteudoDAO.php"); 
	}
    
    public function buscarTrabalheConosco($id){
        $conteudoDAO = new conteudoDAO();
        $list = $conteudoDAO->selectById($id);
        return $list;
    }
    
    
    public function atualizarInicio($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtSubtitulo"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Trabalhe Conosco");
            $contedo->setSessao("Inicio");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
    
    
    public function atualizarQuadro1($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtDesc"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Trabalhe Conosco");
            $contedo->setSessao("Quadro 1");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
    
    public function atualizarQuadro2($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtDesc"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Trabalhe Conosco");
            $contedo->setSessao("Quadro 2");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
    
    public function atualizarQuadro3($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtDesc"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Trabalhe Conosco");
            $contedo->setSessao("Quadro 3");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
    
    public function atualizarQuadro4($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtDesc"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Trabalhe Conosco");
            $contedo->setSessao("Quadro 4");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
    
    public function atualizarQuadro5($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Instancia da classe Evento da Model e preenche atributos
            
            $txtConteudo = $_POST["txtTitulo"].";".$_POST["txtDesc"];
            
            $contedo = new Conteudo();

            $contedo->setIdConteudo($id);
            $contedo->setPagina("Trabalhe Conosco");
            $contedo->setSessao("Quadro 5");
            $contedo->setConteudo($txtConteudo);
            $contedo->setFoto($_POST["txtFoto"]);
			
			$conteudoDAO = new conteudoDAO();
			$conteudoDAO->update($contedo);
			
			echo($txtConteudo);
        
        }
    }
}

?>
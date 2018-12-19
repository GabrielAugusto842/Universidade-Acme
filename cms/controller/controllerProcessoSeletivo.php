<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 20/10/2018
    Objetivo: Controlar as ações do formulário de processo seletivo

    Editado por:
    Data  da alteração:
    Conteudo alterado:
	
	*Em alteração por gabriel*

*/

class controllerProcessoSeletivo {
	//Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/processoSeletivoClass.php");
        require_once($_SESSION['require']."cms/model/dao/processoSeletivoDAO.php");
    }
	
	//Atualizar processo seletivo existente
    public function atualizarProcessoSeletivo($id){
        //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

         	//Instancia da Classe processo seletivo da Model e preenche atributos
           	$processoSeletivoClass = new ProcessoSeletivo();

           	$processoSeletivoClass->setIdPSeletivo($id);
           	$processoSeletivoClass->setArquivo($_POST['txtArquivo']);

            //instancia de Processo Seletivo DAO e chamada do método UPDATE
            $processoSeletivoDAO = new ProcessoSeletivoDAO();
            $processoSeletivoDAO->update($processoSeletivoClass);

       }

    }
	
	//Busca o processo seletivo existente
    public function buscarProcessoSeletivo($id){

        $processoSeletivoDAO = new ProcessoSeletivoDAO();

        $list =  $processoSeletivoDAO->selectById($id);

        return $list;
    }
	
}
?>
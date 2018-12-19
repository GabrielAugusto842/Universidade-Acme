<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 21/11/2018
    Objetivo: Controlar as ações do formulário de entregas

    Editado por: Gabriel
    Data  da alteração: 21/11/2018
    Conteudo alterado: listarByAluno

*/
class controllerEntrega {

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/entregaClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/entregaDAO.php");
    }

    //Listar todas as entregas registradas de um aluno
    public function listarEntregaByAluno($matricula){

        //Instancia da model Entrega
        $entregaDAO = new EntregaDAO();
        //Chama o método para selecionar todos os registros
        $listEntrega = $entregaDAO->selectByAluno($matricula);
        //Retorna o resultado obtido para a view
        return $listEntrega;

    }
	
	//Listar a entrega registrada do aluno pelo id
	public function buscarEntregaByAlunoAndId($matricula, $id) {
		$entregaDAO = new EntregaDAO();

		$list = $entregaDAO->selectByAlunoAndid($matricula, $id);

		return $list;
	}

}

?>

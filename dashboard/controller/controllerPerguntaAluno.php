<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 21/11/2018
    Objetivo: Controlar as ações do formulário de perguntas de alunos

    Editado por: Gabriel
    Data  da alteração: 21/11/2018
    Conteudo alterado: insert

*/
class controllerPerguntaAluno{

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/perguntaAlunoClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/perguntaAlunoDAO.php");
    }

    //Inserir nova pergunta de aluno
    public function inserirPerguntaAluno($matricula,$idForum){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            //Instancia da classe Pergunta aluno da Model
            $perguntaAlunoClass = new PerguntaAluno();

            //Guarda os dados retirados do FORM nos atributos da classe Post
            $perguntaAlunoClass->setMatriculaAluno($matricula);
            $perguntaAlunoClass->setIdForum($idForum);
		  	$perguntaAlunoClass->setTexto($_POST['txtPergunta']);
		  	$perguntaAlunoClass->setMatriculaDirecionado($_POST['slcDirecaoPergunta']);
			
            //Instancia de PerguntaAluno DAO e chamada do método insert
            $perguntaAlunoDAO = new PerguntaAlunoDAO();
            $perguntaAlunoDAO->insert($perguntaAlunoClass);
        }
    }

    //Listar todas as perguntas de alunos registradas
    public function listarPerguntaAluno($idForum){

        //Instancia da model perguntaAluno
        $perguntaAlunoDAO = new PerguntaAlunoDAO();
        //Chama o método para selecionar todos os registros
        $listPerguntaAluno = $perguntaAlunoDAO->selectAll($idForum);
        //Retorna o resultado obtido para a view
        return $listPerguntaAluno;

    }

}

?>

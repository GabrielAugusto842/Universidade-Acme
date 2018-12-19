<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 22/11/2018
    Objetivo: Controlar as ações do formulário de respostas de alunos

    Editado por: Gabriel
    Data  da alteração: 22/11/2018
    Conteudo alterado: listarResposta

*/
class controllerRespostaAluno {

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/respostaAlunoClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/respostaAlunoDAO.php");
    }

//    Inserir novo Comentario
    public function inserirResposta($matricula,$idPergunta){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            //Instancia da classe comentario da Model
            $RespostaAluno = new RespostaAluno();

//            Guarda os dados retirados do FORM nos atributos da classe comentario
            $RespostaAluno->setMatriculaAluno($matricula);
            $RespostaAluno->setIdPerguntaAluno($idPergunta);
		  	$RespostaAluno->setResposta($_POST['txtResposta']);

//            Instancia de Comentario DAO e chamada do método insert
            $respostaAlunoDAO = new respostaAlunoDAO();
            $respostaAlunoDAO->insert($RespostaAluno);
        }
    }

	//Listar todas as respostas de aluno registradas de uma determinada pergunta de aluno
    public function listarRespostaAluno($idPergunta){

        //Instancia da model respostaAluno
        $respostaAlunoDAO = new respostaAlunoDAO();

        //Chama o método para selecionar todos os registros
        $listRespostaAluno = $respostaAlunoDAO->selectAll($idPergunta);

        //Retorna o resultado obtido para a view
        return $listRespostaAluno;

    }

}

?>

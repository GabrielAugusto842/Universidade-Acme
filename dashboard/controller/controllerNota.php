<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 23/11/2018
    Objetivo: Controlar as ações do formulário de notas

    Editado por: Gabriel
    Data  da alteração: 23/11/2018
    Conteudo alterado: listarByAluno

*/
class controllerNota {

    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/notaClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/notaDAO.php");
    }
	
	//Inserir nova nota
    public function inserirNota($idProfessor){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            //Instancia da classe comentario da Model
            $notaClass = new Nota();

			//Guarda os dados retirados do FORM nos atributos da classe nota
			$notaClass->setIdDisciplina($_POST['slcDisciplina']);
			$notaClass->setIdProfessor($idProfessor);
			
			$id = "";
			$nota = "";
			
			$arr = "1,9;2,8;3,10;";//Esse será o array vindo da tela
			$aluno = explode(";",$arr);//Divide o array por meio do ponto e vírgula, separando um aluno de outro
			$i = 0;

			while($aluno[$i]){
				$atb = explode(",", $aluno[$i]);//Divide o array por meio da vírgula, separando a matricula do aluno e a nota
				$id = $atb[0];
				$nota = $atb[1];
				
				$notaClass->setMatriculaAluno($id);
				$notaClass->setNota($nota);

				//Instancia de Nota DAO e chamada do método insert
				$notaDAO = new notaDAO();
				$notaDAO->insert($notaClass);
				
				$i++;
			}
        }
    }

    //Listar todas as notas registradas de um aluno
    public function listarNotaByAluno($matricula){

        //Instancia da model Nota
        $notaDAO = new NotaDAO();
        //Chama o método para selecionar todos os registros
        $listNota = $notaDAO->selectByAluno($matricula);
        //Retorna o resultado obtido para a view
        return $listNota;

    }

}

?>

<?php

	$controller = $_GET['controller'];
	$modo = $_GET['modo'];

	switch ($controller) {

		case "aluno":

			require_once("controller/controllerAluno.php");

			switch ($modo){

				case 'inserir':
					$controllerAluno = new controllerAluno();
					$controllerAluno->inserirAluno();
				 break;

				case 'editar':
					$controllerAluno = new controllerAluno();
					$id = $_GET['id'];
					$controllerAluno->atualizarAluno($id);
				break;

				case 'excluir':
					$controllerAluno = new controllerAluno();
					$id = $_GET['id'];
					$controllerAluno->excluirAluno($id);

				case 'buscar':
					$controllerAluno = new controllerAluno();
					$id = $_GET['id'];
					$controllerAluno->buscarAluno($id);
				break;
			}
			break;  // Fim Aluno

		case "postRedeSocial":

			require_once('controller/controllerPost.php');

			switch($modo){

				case "inserir":

					$matricula = $_GET['matricula'];
					$idRede = $_GET['idRede'];
					$controllerPost = new controllerPost();
					$controllerPost->inserirPost($matricula,$idRede);
					break;

				case "excluir":
					$controllerPost = new controllerPost();
					$id = $_GET['id'];
					$controllerPost->excluirPost($id);
					break;
			}
			break; //Fim post rede social

		case "comentarioRedeSocial":
			require_once('controller/controllerComentario.php');

			switch ($modo) {
				case 'inserir':
					$matricula = $_GET['matricula'];
					$idPost = $_GET['post'];
					$controllerComentario = new controllerComentario();
					$controllerComentario->inserirComentario($matricula, $idPost);
					//echo("ok");
					break;

			}
			break; //Fim comentario rede social

		case "curtidaRedeSocial":
			require_once('controller/controllerCurtida.php');

			switch ($modo) {
				case 'inserir':
					$matricula = $_GET['matricula'];
					$idPost = $_GET['post'];
					$controllerCurtida = new controllerCurtida();
					$controllerCurtida->inserirCurtida($matricula, $idPost);
					break;
				case 'excluir':
					$controllerCurtida = new controllerCurtida();
					$id = $_GET['id'];
					$controllerCurtida->excluirCurtida($id);
					break;
			}
			break; // fim curtida rede social

		case 'perguntaForum':
			require_once("controller/controllerPerguntaAluno.php");

			switch ($modo) {
				case 'inserir':
					$matricula = $_GET['matricula'];
					$idForum = $_GET['idForum'];
					$controllerPerguntaAluno = new controllerPerguntaAluno();
					$controllerPerguntaAluno->inserirPerguntaAluno($matricula, $idForum);
					break;

			}
			break;//Fim pergunta Forum
			
		case 'trabalho':
			require_once("controller/controllerTrabalho.php");
			
			switch ($modo) {
				case 'inserir':
					$matricula = $_GET['matricula'];
					$idEntrega = $_GET['idEntrega'];
					$controllerTrabalho = new controllerTrabalho();
					$controllerTrabalho->inserirTrabalho($matricula, $idEntrega);
					break;
			}
			break; //Fim trabalho
			
		case 'respostaForum':
			require_once("controller/controllerRespostaAluno.php");
			
			switch ($modo) {
				case 'inserir':
					$controllerRespostaAluno = new controllerRespostaAluno();
					$matricula = $_GET['matricula'];
					$idPergunta = $_GET['idPergunta'];
					$controllerRespostaAluno->inserirResposta($matricula, $idPergunta);
					break;
			}
			break; //Fim entrega

	}
?>

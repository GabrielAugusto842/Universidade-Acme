<?php

    //Identifica qual controller será instanciada
    $controller = $_GET['controller'];

    //Verifica qual a controller será instanciada
    switch ($controller){

		//Inicio Case Usuario
        case "usuario":
            //A variavel modo identifica qual o método da controller
            //ira ser chamado (inserir, editar, buscar, excluir , etc)
            $modo = $_GET['modo'];

            // Import da classe controllerUsuario
            require_once("controller/controllerUsuario.php");
            switch ($modo){
                case "inserir":
                    //Instancia da classe ControllerUsuario
                    $controllerUsuario = new controllerUsuario();
                    //Chamada para o método de inserir um novo usuario
                    $controllerUsuario->inserirUsuario();
                break;
                case 'editar':
                    $controllerUsuario = new controllerUsuario();

                    $id = $_GET['id'];

                    //Chama o método para atualizar o registro e envia o id do usuário a ser alterado
                    $controllerUsuario->atualizarUsuario($id);
                break;
                case 'buscar':
                    $controllerUsuario = new controllerUsuario();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];

                    //Chamar o metodo buscar da controller e enviar o id
                    $listUsuario = $controllerUsuario->buscarUsuario($id);

                    require_once("view/usuarios/cadastrarUsuarioModal.php");
                break;

                case 'excluir':
                    $controllerUsuario = new controllerUsuario();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];
                    //Chamar o metodo excluir da controller e enviar o id
                    $controllerUsuario->excluirUsuario($id);
                break;
				case 'ativar':
					$controllerUsuario = new controllerUsuario();
					$id = $_GET['id'];
					$status = $_GET['status'];
					$controllerUsuario->ativarUsuario($id, $status);
				break;

            }
			//Fechamento do primeiro case // case Usuario
			break;

		//Inicio Case Nivel
        case 'nivel':
            $modo = $_GET['modo'];
            require_once("controller/controllerNivel.php");
            switch ($modo) {
                case 'inserir':
                    $controllerNivel = new controllerNivel();
                    $controllerNivel->inserirNivel();
                break;
                case 'editar':
                    $controllerNivel = new controllerNivel();
                    $id = $_GET['id'];
                    $controllerNivel->atualizarNivel($id);
                break;
                case 'buscar':
                    $controllerNivel = new controllerNivel();
                    $id = $_GET['id'];
                    $listNivel = $controllerNivel->buscarNivel($id);

                    //O require precisa ser da modal
                    require_once("view/usuarios/cadastrarNivelModal.php");


                break;
                case 'excluir':
                    $controllerNivel = new controllerNivel();
                    $id = $_GET['id'];
                    $controllerNivel->excluirNivel($id);
                break;
            }
			//Fechamento do primeiro case // case Nivel
        	break;

		//Inicio Case Avaliaçõa
        case 'avaliacao':
            $modo = $_GET['modo'];
            require_once("controller/controllerAvaliacao.php");
            switch ($modo) {
                case 'buscar':
                    $controllerAvaliacao = new controllerAvaliacaoPrimaria();
                    $id = $_GET['id'];
                    $listAvaliacao = $controllerAvaliacao->buscarAvaliacao($id);

                    require_once('view/avaliacoes/visualizarAvaliacaoModal.php');
                break;
                case 'excluir':
                    $controllerAvaliacao = new controllerAvaliacaoPrimaria();
                    $id = $_GET['id'];
                    $controllerAvaliacao->excluirAvaliacao($id);
                break;
				case 'inserir':
					$controllerAvaliacao = new controllerAvaliacaoPrimaria();
                    $controllerAvaliacao->inserirAvaliacao();
				break;
				case 'ativar':
					$controllerAvaliacao = new controllerAvaliacaoPrimaria();
					$id = $_GET['id'];
					$status = $_GET['status'];
					$controllerAvaliacao->ativarAvaliacao($id, $status);
				break;

            }

			//Fechamento do primeiro case // case Nivel
        	break;

		//Inicio Case Produto-Loja
        case 'produtoloja':
            $modo = $_GET['modo'];
            require("controller/controllerProdutoLoja.php");
            switch($modo){
                case 'inserir':
                    $controllerProdutoLoja = new controllerProdutoLoja();
                    $controllerProdutoLoja->inserirProdutoLoja();
                break;
                case 'editar':
                    $id = $_GET['id'];
                    $controllerProdutoLoja = new controllerProdutoLoja();
                    $controllerProdutoLoja->atualizarProdutoLoja($id);
                break;
                case 'excluir':
                    $id = $_GET['id'];
                    $controllerProdutoLoja = new controllerProdutoLoja();
                    $controllerProdutoLoja->excluirProdutoLoja($id);
                break;
                case 'buscar':
                    $id = $_GET['id'];
                    $controllerProdutoLoja = new controllerProdutoLoja();
                    $listProdutoLoja = $controllerProdutoLoja->buscarProdutoLoja($id);

                    //O require precisa ser da modal
                    require_once("view/loja/cadastrarProdutoModal.php");
                break;

            }
            //Fechamento do primeiro case // case Produto-Loja
        	break;

		//Inicio Case Categoria-Produto-Loja
        case 'catprodutoloja':
            $modo = $_GET['modo'];
            require_once("controller/controllerCatProdutoLoja.php");
            switch ($modo) {
                case 'inserir':
                    $controllerCatProdutoLoja = new controllerCatProdutoLoja();
                    $controllerCatProdutoLoja->inserirCatProdutoLoja();
                	
					break;
					
				 case 'editar':
					
                    $id = $_GET['id'];
					
                    $controllerCatProdutoLoja = new controllerCatProdutoLoja();
                    $controllerCatProdutoLoja->autualizarCatProdutoLoja($id);
					
                break;
					
				case 'excluir':
                    $controllerCatProdutoLoja = new controllerCatProdutoLoja();
					
					$id = $_GET['id'];
					
                    $controllerCatProdutoLoja->deletarCatProdutoLoja($id);
                	
					
					break;
					
				case 'buscar':
                    $controllerCatProdutoLoja = new controllerCatProdutoLoja();
					
					$id = $_GET['id'];
					
                    $listCatProdutoLoja= $controllerCatProdutoLoja->buscarCatProdutoLoja($id);
					require_once("view/loja/cadastrarCategoriaModal.php");
					
					break;
				

            }
			//Fechamento do primeiro case // Categoria-Produto-Loja
			break;

		//Inicio Case Evento
        case 'evento':
            //A variavel modo identifica qual o método da controller
            //ira ser chamado (inserir, editar, buscar, excluir , etc)
            $modo = $_GET['modo'];

            // Import da classe controllerEvento
            require_once("controller/controllerEvento.php");

            switch ($modo){
                case "inserir":

					$controllerEvento = new controllerEvento();
					$controllerEvento->inserirEvento();


                break;
                case 'editar':

                    $controllerEvento = new controllerEvento();

                    $id = $_GET['id'];

                    //Chama o método para atualizar o registro e envia o id do usuário a ser alterado
                    $controllerEvento->atualizarEvento($id);
                break;
                case 'buscar':
                    $controllerEvento = new controllerEvento();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];

                    //Chamar o metodo buscar da controller e enviar o id
                    $listEvento = $controllerEvento->buscarEvento($id);

                    require_once("view/eventos/cadastrarEventoModal.php");
                break;

                case 'excluir':
                    $controllerEvento = new controllerEvento();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];

                    //Chamar o metodo excluir da controller e enviar o id
                    $controllerEvento->excluirEvento($id);
                break;

            }
			//Fechamento do primeiro case // case Evento
			break;

        //Inicio case noticia
        case 'noticia':
            //A variavel modo identifica qual o método da controller
            //ira ser chamado (inserir, editar, buscar, excluir , etc)
            $modo = $_GET['modo'];

            //Import da classe controllerNoticia
            require_once("controller/controllerNoticia.php");
            switch ($modo) {
                case 'inserir':

                    $controllerNoticia = new controllerNoticia();
                    $controllerNoticia->inserirNoticia();

                    break;
                case 'editar':
                    $controllerNoticia = new controllerNoticia();

                    $id = $_GET['id'];

                    //Chama o método para atualizar o registro e envia o id da noticia a ser alterado
                    $controllerNoticia->atualizarNoticia($id);
                    break;
                case 'buscar':
                    $controllerNoticia = new controllerNoticia();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];

                    //Chamar o metodo buscar da controller e enviar o id
                    $listNoticia = $controllerNoticia->buscarNoticia($id);

                    require_once("view/noticia/cadastrarNoticiaModal.php");
                    break;

                case 'excluir':
                    $controllerNoticia = new controllerNoticia();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];
                    //Chamar o metodo excluir da controller e enviar o id
                    $controllerNoticia->excluirNoticia($id);
                    break;

            }
            //Fechamento do primeiro case // case noticia
            break;

		//Inicio case campanha
        case 'unidade':
            //A variavel modo identifica qual o método da controller
            //ira ser chamado (inserir, editar, buscar, excluir , etc)
            $modo = $_GET['modo'];

            //Import da classe controllerCampanha
            require_once("controller/controllerUnidade.php");
            switch ($modo) {
                case 'inserir':

                    $controllerUnidade =  new controllerUnidade();

					$controllerUnidade->inserirUnidade();


                    break;
                case 'editar':

                   $controllerUnidade = new controllerUnidade();

                    $id = $_GET['id'];

                    //Chama o método para atualizar o registro e envia o id da campanha a ser alterado
                  	$controllerUnidade->atualizarUnidade($id);

                    break;
                case 'buscar':

                    $controllerUnidade = new controllerUnidade();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];

                    //Chamar o metodo buscar da controller e enviar o id
                    $listUnidade = $controllerUnidade->buscarUnidade($id);

                    require_once("view/unidades/cadastrarUnidadeModal.php");
                    break;

                case 'excluir':

                    $controllerUnidade = new controllerUnidade();
                    //Recebe o id do registro enviado pela view por ajax
                    $id = $_GET['id'];
                    //Chamar o metodo excluir da controller e enviar o id
                    $controllerUnidade->excluirUnidade($id);

                    break;

            }
            //Fechamento do primeiro case // case Unidade
            break;



		//Inicio case campanha
        case 'campanha':
            //A variavel modo identifica qual o método da controller
            //ira ser chamado (inserir, editar, buscar, excluir , etc)
            $modo = $_GET['modo'];

            //Import da classe controllerCampanha
            require_once("controller/controllerCampanha.php");
            switch ($modo) {
                
                case 'editar':
                    $controllerCampanha = new controllerCampanha();

                    $id = $_GET['id'];

                    //Chama o método para atualizar o registro e envia o id da campanha a ser alterado
                    $controllerCampanha->atualizarCampanha($id);
                    break;

            }
            //Fechamento do primeiro case // case campanha
            break;

		//Cursos

        // FORMAÇÃO
        case 'formacao':
            $modo = $_GET['modo'];
            require_once("controller/controllerFormacao.php");
            switch ($modo) {
                case 'inserir':
                    $controllerFormacao = new controllerFormacao();
                    $controllerFormacao->inserirFormacao();

                    break;
                case 'editar':
                    $controllerFormacao = new controllerFormacao();

                    $id = $_GET['id'];
                    $controllerFormacao->atualizarFormacao($id);
                    break;
                case 'buscar':
                    $controllerFormacao = new controllerFormacao();
                    $id = $_GET['id'];

                    $listFormacao = $controllerFormacao->buscarFormacao($id);

                    require_once("view/cursos/cadastrarFormacaoModal.php");
                    break;

                case 'excluir':
                    $controllerFormacao = new controllerFormacao();
                    $id = $_GET['id'];
                    $controllerFormacao->excluirFormacao($id);
                    break;
            }
            break;

        case 'catcurso':
            $modo = $_GET['modo'];
            require_once("controller/controllerCatCurso.php");
            switch ($modo) {
                case 'inserir':
                    $controllerCatCurso = new controllerCatCurso();
                     $controllerCatCurso->inserirCatCurso();

                    break;
                case 'editar':
                    $controllerCatCurso = new controllerCatCurso();

                    $id = $_GET['id'];
                     $controllerCatCurso->atualizarCatCurso($id);
                    break;
                case 'buscar':
                   $controllerCatCurso = new controllerCatCurso();
                    $id = $_GET['id'];

                    $listCat = $controllerCatCurso->buscarCatCurso($id);

                    require_once("view/cursos/cadastrarCategoriaModal.php");
                    break;

                case 'excluir':
                    $controllerCatCurso = new controllerCatCurso();
                    $id = $_GET['id'];
                    $controllerCatCurso->excluirCatCurso($id);
                    break;
            }
            break;

        case 'curso':
            $modo = $_GET['modo'];
            require_once("controller/controllerCurso.php");
            switch ($modo) {
                case 'inserir':
                    $controllerCurso = new controllerCurso();
                     $controllerCurso->inserirCurso();

                    break;
                case 'editar':
                    $controllerCurso = new controllerCurso();

                    $id = $_GET['id'];
                     $controllerCurso->atualizarCurso($id);
                    break;
                case 'buscar':
                   $controllerCurso = new controllerCurso();
                    $id = $_GET['id'];

                    $listCurso = $controllerCurso->buscarCurso($id);

                    require_once("view/cursos/cadastrarCursoModal.php");
                    break;

                case 'excluir':
                    $controllerCurso = new controllerCurso();
                    $id = $_GET['id'];
                    $controllerCurso->excluirCurso($id);
                    break;
            }
            break;


		case 'conteudoSobre':
            $modo = $_GET['modo'];
            require_once("controller/conteudo/controllerSobre.php");
            switch ($modo) {

                case 'editarNH':
                    $controllerSobre = new controllerSobre();

                    $id = $_GET['id'];

                     $controllerSobre->atualizarNossaHistoria($id);


                    break;

                case 'editarNF':
                    $controllerSobre = new controllerSobre();

                    $id = $_GET['id'];

                     $controllerSobre->atualizarNossaFilosofia($id);


                    break;

                case 'editarInicio':
                    $controllerSobre = new controllerSobre();

                    $id = $_GET['id'];

                     $controllerSobre->atualizarInicio($id);


                    break;

                 case 'editarParceiros':
                    $controllerSobre = new controllerSobre();

                    $id = $_GET['id'];

                     $controllerSobre->atualizarParceiros($id);


                    break;
            }
            break;

        case 'conteudoAvaliacao':
            $modo = $_GET['modo'];
            require_once("controller/conteudo/controllerAvaliacao.php");
            switch ($modo) {

                case 'editarInicio':
                    $controllerAvaliacao = new controllerAvaliacao();

                    $id = $_GET['id'];

                     $controllerAvaliacao->atualizarInicio($id);


                    break;

            }
            break;

        case 'conteudoHome':
            $modo = $_GET['modo'];
            require_once("controller/conteudo/controllerHome.php");
            switch ($modo) {

                case 'editarInicio':
                    $controllerAvaliacao = new controllerHome();

                    $id = $_GET['id'];

                     $controllerAvaliacao->atualizarInicio($id);


                    break;

            }
            break;

        case 'conteudoVestibular':
            $modo = $_GET['modo'];
            require_once("controller/conteudo/controllerVestibular.php");
            require_once("controller/controllerProcessoSeletivo.php");
            switch ($modo) {

                case 'editarInicio':
                    $controllerAvaliacao = new controllerVestibular();

                    $id = $_GET['id'];

                     $controllerAvaliacao->atualizarInicio($id);


                    break;

				case 'editarLista':
                    $controllerProcessoSeletivo = new controllerProcessoSeletivo();

                    $id = $_GET['id'];

                     $controllerProcessoSeletivo->atualizarProcessoSeletivo($id);


                    break;

                case 'editarBS':
                    $controllerAvaliacao = new controllerVestibular();

                    $id = $_GET['id'];

                     $controllerAvaliacao->atualizarBolsaEstudos($id);


                    break;

                 case 'editarConvenio':
                    $controllerAvaliacao = new controllerVestibular();

                    $id = $_GET['id'];

                     $controllerAvaliacao->atualizarConvenio($id);


                    break;
            }

            break;

        case 'conteudoTrabalheConosco':
            $modo = $_GET['modo'];
            require_once("controller/conteudo/controllerTrabalheConosco.php");
            switch ($modo) {

                case 'editarInicio':
                    $controllerTrabalheConosco = new controllerTrabalheConosco();

                    $id = $_GET['id'];

                    $controllerTrabalheConosco->atualizarInicio($id);


                    break;

                case 'editarQuadro1':
                    $controllerTrabalheConosco = new controllerTrabalheConosco();

                    $id = $_GET['id'];

                    $controllerTrabalheConosco->atualizarQuadro1($id);


                    break;

                case 'editarQuadro2':
                    $controllerTrabalheConosco = new controllerTrabalheConosco();

                    $id = $_GET['id'];

                    $controllerTrabalheConosco->atualizarQuadro2($id);


                    break;

                case 'editarQuadro3':
                    $controllerTrabalheConosco = new controllerTrabalheConosco();

                    $id = $_GET['id'];

                    $controllerTrabalheConosco->atualizarQuadro3($id);


                    break;

                case 'editarQuadro4':
                    $controllerTrabalheConosco = new controllerTrabalheConosco();

                    $id = $_GET['id'];

                    $controllerTrabalheConosco->atualizarQuadro4($id);


                    break;

                case 'editarQuadro5':
                    $controllerTrabalheConosco = new controllerTrabalheConosco();

                    $id = $_GET['id'];

                    $controllerTrabalheConosco->atualizarQuadro5($id);


                    break;
            }

            break;

		case 'trabConosco':
			$modo = $_GET['modo'];
			require_once("controller/controllerTrabalhe.php");
			switch($modo){
				case 'inserir':
                	$controllerTrabalhe = new controllerTrabalhe();
                    $controllerTrabalhe->inserirTrabConosco();

                    break;
                case 'buscar':
                   	$controllerTrabalhe = new controllerTrabalhe();
                    $id = $_GET['id'];

                    $listTrabalhe = $controllerTrabalhe->buscarTrabConosco($id);

                    require_once("../trabalhe.php");
                    break;

                case 'excluir':
                    $controllerTrabalhe = new controllerTrabalhe();
                    $id = $_GET['id'];
                    $controllerTrabalhe->excluirTrabConosco($id);
                    break;
			}
            break;

        case 'email':
			$modo = $_GET['modo'];
			require_once("controller/controllerEmail.php");
			switch($modo){
				case 'enviar':
                	$controllerEmail = new controllerEmail();
                    $controllerEmail->enviarEmail();
                    break;
			}
            break;
        case 'parceiro':
            $modo = $_GET['modo'];
            require_once("controller/controllerParceiro.php");
            switch($modo){
                    case 'inserir':
                    $controllerParceiro = new controllerParceiro();
                     $controllerParceiro->inserirParceiro();

                    break;
                case 'editar':
                    $controllerParceiro = new controllerParceiro();

                    $id = $_GET['id'];
                     $controllerParceiro->atualizarParceiro($id);
                    break;
                case 'buscar':
                   $controllerParceiro = new controllerParceiro();
                    $id = $_GET['id'];

                    $listP = $controllerParceiro->buscarParceiro($id);

                    require_once("view/parceiros/cadastrarParceiroModal.php");
                    break;

                case 'excluir':
                    $controllerParceiro = new controllerParceiro();
                    $id = $_GET['id'];
                    $controllerParceiro->excluirParceiro($id);
                    break;
                
            }
        
    }


?>

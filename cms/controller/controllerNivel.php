<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 29/08/2018
    Objetivo: Controlar as ações do formulário de NIVEIS

    Editado por:
    Data  da alteração:
    Conteudo alterado:
*/
class controllerNivel{


    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/nivelClass.php");
        require_once($_SESSION['require']."cms/model/dao/nivelDAO.php");
        require_once($_SESSION['require'].'cms/controller/controllerPagina.php');
    }

    public function inserirNivel(){
       //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

           $nivelClass = new Nivel();
           $nivelClass->setNome($_POST['txtNome']);

            //TODO: Talvez ja resgatar os values das paginas, não sei como irá funcionar

            //instancia de Nivel DAO e chamada do método insert
            $nivelDAO = new NivelDAO();
            $retorno = $nivelDAO->insert($nivelClass);
			//Retorno de ref em true ou false
			//cadastro de permição
			if($retorno['ref']){
				
				require_once($_SESSION['require'].'cms/controller/controllerPagina.php');
                    
				$controllerPagina = new controllerPagina();        
				$listPagina = $controllerPagina->listarPagina();
				
				$cont  = 0;
				while($cont < count($listPagina)){
								
					if(isset($_POST["chk".utf8_encode($listPagina[$cont]->getNome())])){
						
						$nivelDAO->cadastrarPermissao($listPagina[$cont]->getIdPagina(),$retorno['id']);
						echo("foi");
						
					}
					
					$cont++;
					
				}
			}	
		}
   }
    

    //Atualizar Contato existente
    public function atualizarNivel($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){

         //TODO: Talvez ja resgatar os values das paginas, não sei como irá funcionar

           $nivelClass = new Nivel();
           $nivelClass->setIdNivel($id);
           $nivelClass->setNome($_POST['txtNome']);

            //instancia de Nivel DAO e chamada do método insert
           $nivelDAO = new NivelDAO();
           $retorno = $nivelDAO->update($nivelClass);
		   if($retorno){
			   
			   $nivelDAO->deletarPermissao($id);
			   
			   	require_once($_SESSION['require'].'cms/controller/controllerPagina.php');
                    
				$controllerPagina = new controllerPagina();        
				$listPagina = $controllerPagina->listarPagina();
				
				$cont  = 0;
				while($cont < count($listPagina)){
								
					if(isset($_POST["chk".utf8_encode($listPagina[$cont]->getNome())])){
						
						$nivelDAO->cadastrarPermissao($listPagina[$cont]->getIdPagina(),$id);
						echo("foi");
						
					}
					
					$cont++;
					
				}
		   }
		}
	}

    //Busca o usuario existente
    public function buscarNivel($id){

        $nivelDAO = new NivelDAO();

        $list =  $nivelDAO->selectById($id);

        return $list;
    }

    //Excluir nivel
    public function excluirNivel($id){
         $nivelDAO = new NivelDAO();
        //chama o metódo  delete da classe nivel
		 $nivelDAO->deletarPermissao($id);
         $nivelDAO->delete($id);
    }

    //Listar todos os niveis registrados
    public function listarNivel(){

        $nivelDAO = new NivelDAO();
        $listNivel = $nivelDAO->selectAll();

        //Retorna o resultado obtido para a view
        return $listNivel;

    }

	//Listar todas as páginas de um nível registradas
    public function listarPermissao($idUsuario){

        $nivelDAO = new NivelDAO();
        $listNivel = $nivelDAO->selectPermissao($idUsuario);

        //Retorna o resultado obtido para a view
        return $listNivel;

    }

}

?>

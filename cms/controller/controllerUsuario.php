<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 29/08/2018
    Objetivo: Controlar as ações do formulário de usuarios

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/
class controllerUsuario{


    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/usuarioClass.php");
        require_once($_SESSION['require']."cms/model/dao/usuarioDAO.php");
    }
    //Inserir Novo Usuario
    public function inserirUsuario(){
       //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

			//Instancia da Classe Usuario da Model
			$usuarioClass = new Usuario();

			//Guarda os dados retirados do FORM nos atributos da classe usuario
			$usuarioClass->setNome($_POST['txtNome']);
			$usuarioClass->setUsuario($_POST['txtUsuario']);
			$usuarioClass->setEmail($_POST['txtEmail']);
			$senha = md5($_POST['txtSenha']);
			$usuarioClass->setSenha($senha);
			$usuarioClass->setFoto($_POST['txtFoto']);
			$usuarioClass->setIdNivel($_POST['txtNivel']);
			$usuarioClass->setAtivo(1);


			//instancia de Usuario DAO e chamada do método insert
			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO::Insert($usuarioClass);

       }
    }

    //Atualizar Usuario existente
    public function atualizarUsuario($id){
        //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

			//Instancia da Classe Usuario da Model e preenche atributos
			$usuarioClass = new Usuario();

			$usuarioClass->setIdUsuario($id);
			$usuarioClass->setNome($_POST['txtNome']);
			$usuarioClass->setUsuario($_POST['txtUsuario']);
			$usuarioClass->setEmail($_POST['txtEmail']);
			$senha = md5($_POST['txtSenha']);
			$usuarioClass->setSenha($senha);
			$usuarioClass->setFoto($_POST['txtFoto']);
			$usuarioClass->setIdNivel($_POST['txtNivel']);
			$usuarioClass->setAtivo(1);

			//instancia de Usuario DAO e chamada do método UPDATE

			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO::Update($usuarioClass);


       }

    }

    //Busca o usuario existente
    public function buscarUsuario($id){

        $usuarioDAO = new UsuarioDAO();

        $list =  $usuarioDAO::SelectById($id);

        return $list;
    }

    //Excluir usuario
    public function excluirUsuario($id){

        $usuarioDAO = new UsuarioDAO();

        //chama o metódo  delete da classe usuario
        $usuarioDAO->delete($id);
    }

    //Listar todos os usuarios registrados
    public function listarUsuario(){

        //Instancia  da model Usuario
         $usuarioDAO = new UsuarioDAO();

        //Chama o método para selecionar todos os registros
        $listUsuario = $usuarioDAO::selectAll();

        //Retorna o resultado obtido para a view
        return $listUsuario;

    }

    public function autenticar(){
         if($_SERVER['REQUEST_METHOD']=='POST'){
           $usuarioClass = new Usuario();

           //Guarda os dados retirados do FORM nos atributos da classe usuario
             $usuarioClass->setUsuario($_POST['txtUsuario']);
			 $senha = md5($_POST['txtSenha']);
             $usuarioClass->setSenha($senha);

            $usuarioDAO = new UsuarioDAO();

            $usuarioDAO::login($usuarioClass->getUsuario(), $usuarioClass->getSenha());


       }
    }

	public function ativarUsuario($id, $status) {
		$usuarioDAO = new usuarioDAO();
		$usuarioDAO->active($id, $status);
	}

}

?>

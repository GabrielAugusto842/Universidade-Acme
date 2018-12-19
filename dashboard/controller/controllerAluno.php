<?php
/*
    Projeto: Universidade ACME area do aluno
    Autor: Alcateck
    Data: 24/10/2018
    Objetivo: Controlar as ações do formulário de alunos

    Editado por: Gabriel
    Data  da alteração: 24/10/2018
    Conteudo alterado: criação da controller

*/
class controllerAluno{


    //Construtor
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."dashboard/model/alunoClass.php");
        require_once($_SESSION['require']."dashboard/model/dao/alunoDAO.php");
    }

    //Atualizar Aluno existente
    public function atualizarAluno($id){
        //Verifica se os dados estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){
			
		$caminhoFoto;	
			
		$nomeArquivo = $_FILES['flImg']['name'];
        $tamanhoArquivo =  round($_FILES['flImg']['size']/1024);
        // Usar basenemae quando não retornar apenas o nome (versão PHP)
        //$nomeArquivo = basename($_FILES['frmFoto']['name']);

        // strchr busca ultima aparição do caracter informado
        //Pega a extensão do arquivo
        $ext = strchr($nomeArquivo,'.');

        //Nome da pasta de arquivos criada
        $upload_dir = $_SESSION['require']."/dashboard/view/img/usuarios/";

        //Guarda apenas o nome do arquivo sem sua extensão
        $nomeFoto = pathinfo($nomeArquivo, PATHINFO_FILENAME);

        //MD5 criptografa o nome do arquivo
	
		$nome_arquivo = md5(uniqid(time()).$nomeArquivo).$ext;


        //Extensões de arquivos permitidos
        $extensoes = array('.jpg','.png','.gif','.svg','.jpeg');

        if(in_array($ext,$extensoes)){
            if($tamanhoArquivo <= 5120){

                $arquivo_tmp = $_FILES['flImg']['tmp_name'];

                
                if(move_uploaded_file($arquivo_tmp,$upload_dir.$nome_arquivo)){

				 	$caminhoFoto = "/dashboard/view/img/usuarios/".$nome_arquivo;
                }

            }else{
                echo('<script> console.log("Erro: Tamanho do aquivo Excedido."); </script>');
            }
        }else{	
            echo('<script> console.log("Erro: Formato do aquivo INVALIDO."); </script>');
        }
			

         //Instancia da Classe Aluno da Model e preenche atributos
           $alunoClass = new aluno();
		   $alunoClass->setFoto($caminhoFoto);	
           $alunoClass->setMatricula($id);
           $alunoClass->setSenha($_POST['txtSenha']);
           // $alunoClass->setFoto($_POST['txtFoto']);
           $logradouro = $_POST['txtLogradouro'];
           $complemento = $_POST['txtComplemento'];
           $numero = $_POST['txtNumero'];
           $bairro = $_POST['txtBairro'];
           $cep = $_POST['txtCep'];
           $estado = $_POST['slcUF'];
           $cidade = $_POST['slcCidade'];
           $endereco = $logradouro.", ".$numero.", ".$complemento.", ".$bairro.", ".$cep.", ".$estado.", ".$cidade;
           $alunoClass->setEndereco($endereco);
           $alunoClass->setEmail($_POST['txtEmail']);
           $alunoClass->setTelefone($_POST['txtTelefone']);
           $alunoClass->setCelular($_POST['txtCelular']);
           $alunoClass->setSexo($_POST['rdoSexo']);
           $alunoClass->setPrimeiroAcesso(1);
			
			
		  

            //instancia de Aluno DAO e chamada do método UPDATE

            $alunoDAO = new AlunoDAO();
            $alunoDAO::Update($alunoClass);


       }

    }

    //Busca o aluno existente
    public function buscarAluno($id){

        $alunoDAO = new AlunoDAO();

        $list =  $alunoDAO->selectById($id);

        return $list;
    }

    //Excluir aluno
    public function excluirAluno($id){

        $alunoDAO = new AlunoDAO();

        //chama o metódo delete da classe aluno
        $alunoDAO->delete($id);
    }

    //Listar todos os alunos registrados
    public function listarAluno(){

        //Instancia  da model Aluno
        $alunoDAO = new AlunoDAO();

        //Chama o método para selecionar todos os registros
        $listAluno = $alunoDAO::selectAll();

        //Retorna o resultado obtido para a view
        return $listAluno;

    }

    //Fazer login do aluno
    public function autenticar(){
         if($_SERVER['REQUEST_METHOD']=='POST'){
           $alunoClass = new aluno();

           //Guarda os dados retirados do FORM nos atributos da classe aluno
           $alunoClass->setMatricula($_POST['txtMatricula']);
           $alunoClass->setSenha($_POST['txtSenha']);

           $alunoDAO = new alunoDAO();

           $resposta = $alunoDAO->login($alunoClass->getMatricula(), $alunoClass->getSenha());

		   if($resposta){
			    header('location:'.$_SESSION['requireUrl'].'dashboard');
		   }else{
			   header('location: login.php?error=1');
		   }

       }
    }

    //Verificar se os dados preenchidos estão corretos
    public function verificarAcesso(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $alunoClass = new aluno();

            //Guarda os dados retirados do FORM nos atributos da classe aluno
            $alunoClass->setMatricula($_POST['txtMatricula']);
            $alunoClass->setCpf($_POST['txtCpf']);
            $alunoClass->setDtNasc($_POST['txtDtNasc']);


            $alunoDAO = new alunoDAO();

            $resposta = $alunoDAO->access($alunoClass->getMatricula(), $alunoClass->getCpf(), $alunoClass->getDtNasc());
			if($resposta){
			    header('location: continuar-cadastro.php');
		   }else{
			   header("location:acesso.php?error=1");
		   }
        }
    }

}

?>

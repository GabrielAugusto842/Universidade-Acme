<?php
/*
    Projeto: Universidade ACME área do professor
    Autor: Alcateck
    Data: 22/11/2018
    Objetivo: Manipulação do banco de dados na área do profesor 

    Editado por: Gabriel
    Data  da alteração: 29/11/2018
    Conteudo alterado: Update

*/

class professorDAO {
	public function __construct(){
		require_once('bdClassphp');
	}
	
	//Atualizar professor no BD
    public function update(Professor $professor) {
        $sql = "update tbl_professor set senha = '".$professor->getSenha()."', endereco = '".$professor->getEndereco()."', email = '".$professor->getEmail()."', telefone = '".$professor->getTelefone()."', celular = '".$professor->getCelular()."', sexo = '".$professor->getSexo()."', primeiroAcesso = ".$professor->getPrimeiroAcesso()." where matricula = ".$professor->getMatriculaProfessor();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Listar todos os professor do BD
    public function selectAll(){
		
		$sql = "select * from tbl_professor";
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listProfessor = null;
		while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
			$listProfessor[] = new Professor();
			$listProfessor[$cont]->setMatriculaProfessor($rs['matricula']);
			$listProfessor[$cont]->setNome($rs['nome']);
			$listProfessor[$cont]->setCpf($rs['cfp']);
			$listProfessor[$cont]->setDtNasc($rs['dtNasc']);
			$listProfessor[$cont]->setSenha($rs['senha']);
			$listProfessor[$cont]->setFoto($rs['foto']);
			$listProfessor[$cont]->setEndereco($rs['endereco']);
			$listProfessor[$cont]->setEmail($rs['email']);
			$listProfessor[$cont]->setTelefone($rs['telefone']);
			$listProfessor[$cont]->setCelular($rs['celular']);
			$listProfessor[$cont]->setSexo($rs['sexo']);
			$listProfessor[$cont]->setPrimeiroAcesso($rs['primeiroAcesso']);
			
			$cont += 1;
		}
		return $listProfessor;
        $conex->closeDatabase();
        
    }

	//Listar um professor no BD
    public function selectById($id){
        $sql = "select * from tbl_professor where matricula =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listProfessor = new Professor();

            $listProfessor->setMatriculaProfessor($rs['matricula']);
            $listProfessor->setNome($rs['nome']);
            $listProfessor->setCpf($rs['cpf']);
            $listProfessor->setDtNasc($rs['dtNasc']);
			$listProfessor->setSenha($rs['senha']);
            $listProfessor->setFoto($rs['foto']);
			$listProfessor->setEndereco($rs['endereco']);
            $listProfessor->setEmail($rs['email']);
			$listProfessor->setTelefone($rs['telefone']);
            $listProfessor->setCelular($rs['celular']);
            $listProfessor->setSexo($rs['sexo']);
			$listProfessor->setPrimeiroAcesso($rs['primeiroAcesso']);

            return $listProfessor;
        }
    }
	
	//Function para fazer login e entrar na dashboard - área do professor
    public function login($matricula, $senha){
        @session_start();

        $sql = "SELECT * from tbl_professor WHERE matricula = '".$matricula."' AND senha = '".$senha."' and primeiroAcesso = 1 ";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();
		
        $stmt = $PDO_conex->prepare($sql);

        // Executando statement
        $stmt->execute();

        // Obter linha consultada
        $obj = $stmt->fetchObject();

        // Se a linha existe: indicar que esta logado e encaminhar para outro lugar
        if ($obj) {

            $dados = array("matricula" => $obj->matricula, "cpf" => $obj->cpf , "nome" =>  $obj->nome, "dtNasc" => $obj->dtNasc, "foto" =>  $obj->foto);
            
            $_SESSION['professor'] = $dados;
			
			return true;
 
        } else {
            unset($_SESSION['professor']);
        }

    }

    //Function para verificar se os dados estão corretos e concluir o Cadastro do professor
    public function access($matricula, $cpf, $dtNasc){
        @session_start();
		
		$sql = "SELECT * FROM tbl_professor WHERE matricula = ".$matricula." AND cpf = '".$cpf."' AND dtNasc = '".$dtNasc."' AND primeiroAcesso = 0";
		
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $stmt = $PDO_conex->prepare($sql);

        // Executando statement
        $stmt->execute();
		
		echo($sql);
		
        //Obter linha consultada
        $obj = $stmt->fetchObject();

        //Se a linha existe: indicar que os dados estão corretos e encaminhar para outro lugar
        if ($obj) {

            $dados = array("matricula" => $obj->matricula, "cpf" => $obj->cpf , "nome" =>  $obj->nome, "dtNasc" => $obj->dtNasc, "foto" =>  $obj->foto);
            
            $_SESSION['professor'] = $dados;
			
			return true;
 
        } else {
            unset($_SESSION['professor']);
        }
    }

}

?>
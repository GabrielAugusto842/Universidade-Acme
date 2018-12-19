<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 23/10/2018
    Objetivo: Manipulação do banco de dados na área de alunos

    Editado por: Gabriel
    Data  da alteração: 23/10/2018
    Conteudo alterado: update, delete, selectAll e selectById

*/

class alunoDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Atualizar aluno no BD
    public function update(Aluno $aluno) {
        $sql = "update tbl_aluno set senha = '".$aluno->getSenha()."', endereco = '".$aluno->getEndereco()."', email = '".$aluno->getEmail()."', foto = '".$aluno->getFoto()."', telefone = '".$aluno->getTelefone()."', celular = '".$aluno->getCelular()."', sexo = '".$aluno->getSexo()."',
        primeiroAcesso = ".$aluno->getPrimeiroAcesso()." where matricula = ".$aluno->getMatricula();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Excluir aluno no BD
    public function delete($id){
        $sql = "delete from tbl_aluno where matricula =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todos os alunos do BD
    public function selectAll(){
        $sql = "select * from tbl_aluno";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listAluno = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe aluno
            $listAluno[] = new Aluno();
            $listAluno[$cont]->setMatricula($rs['matricula']);
            $listAluno[$cont]->setNome($rs['nome']);
            $listAluno[$cont]->setCpf($rs['cpf']);
            //Data de nascimento
            $dataNasc = $rs['dtNasc'];
            $dt = explode(" ",$dataNasc);
            $data = explode("-", $dt[0]);
            $data = $data[2]."/".$data[1]."/".$data[0];
            $tempo = substr($dataTempo[1], 0,-3);
            $dataNasc = $data. " as ". $tempo."H";
            $listAluno[$cont]->setInicio($dataNasc);
            $listAluno[$cont]->setSenha($rs['senha']);
            $listAluno[$cont]->setIdTurma($rs['idTurma']);
            $listAluno[$cont]->setFoto($rs['foto']);
            $listAluno[$cont]->setEmail($rs['email']);
            $listAluno[$cont]->setTelefone($rs['telefone']);
            $listAluno[$cont]->setCelular($rs['celular']);
            $listAluno[$cont]->setSexo($rs['sexo']);

            $cont += 1;
        }
        return $listAluno;
        $conex->closeDatabase();
    }

    //Listar um aluno no BD
    public function selectById($id){
        $sql = "select * from tbl_aluno where matricula =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listAluno = new aluno();

            $listAluno->setMatricula($rs['matricula']);
            $listAluno->setNome($rs['nome']);
            $listAluno->setCpf($rs['cpf']);
            $listAluno->setDtNasc($rs['dtNasc']);
			$listAluno->setSenha($rs['senha']);
            $listAluno->setIdTurma($rs['idTurma']);
            $listAluno->setFoto($rs['foto']);
            $listAluno->setEmail($rs['email']);
			$listAluno->setTelefone($rs['telefone']);
            $listAluno->setCelular($rs['celular']);
            $listAluno->setSexo($rs['sexo']);

            return $listAluno;
        }
    }

    //Function para fazer login e entrar na dashboard - área do aluno
    public function login($matricula, $senha){
        @session_start();

        $sql = "SELECT * from vw_aluno WHERE matricula = '".$matricula."' AND senha = '".$senha."' and primeiroAcesso = 1 ";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();
		
        $stmt = $PDO_conex->prepare($sql);

        // Executando statement
        $stmt->execute();

        // Obter linha consultada
        $obj = $stmt->fetchObject();

        // Se a linha existe: indicar que esta logado e encaminhar para outro lugar
        if ($obj) {

            $dados = array("matricula" => $obj->matricula, "idRede" =>  $obj->idRede , "idCurso" =>  $obj->idCurso, "curso" => $obj->curso, "idTurma" => $obj->idTurma, "turma" => $obj->turma, "idForum" =>  $obj->idForum,"cpf" => $obj->cpf , "nome" =>  $obj->nome, "foto" =>  $obj->foto);
            
            $_SESSION['aluno'] = $dados;
			
			return true;
 
        } else {
            unset($_SESSION['aluno']);
        }

    }

    //Function para verificar se os dados estão corretos e concluir o Cadastro do aluno
    public function access($matricula, $cpf, $dtNasc){
        @session_start();
		
		$sql = "SELECT * FROM vw_aluno WHERE matricula = ".$matricula." AND cpf = '".$cpf."' AND dtNasc = '".$dtNasc."' AND primeiroAcesso = 0";
		
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

            $dados = array("matricula" => $obj->matricula, "idRede" =>  $obj->idRede , "idCurso" =>  $obj->idCurso, "curso" => $obj->curso, "idTurma" => $obj->idTurma, "turma" => $obj->turma, "idForum" =>  $obj->idForum,"cpf" => $obj->cpf , "nome" =>  $obj->nome, "foto" =>  $obj->foto);
            
            $_SESSION['aluno'] = $dados;
			
			return true;
 
        } else {
            unset($_SESSION['aluno']);
        }
    }

}

?>

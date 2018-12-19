<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 22/11/2018
    Objetivo: Manipulação do banco de dados na área de mensalidades

    Editado por: Gabriel
    Data  da alteração: 22/11/2018
    Conteudo alterado: selectByAluno

*/

class mensalidadeDAO {
    public function __construct(){
        require_once('bdClass.php');
    }
	
	//Listar mensalidades de um aluno no BD
	public function selectByAluno($matricula){
		$sql = "select * from vw_mensalidade where matricula =".$matricula;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listMensalidade = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe mensalidade
            $listMensalidade[] = new Mensalidade();
            $listMensalidade[$cont]->setIdMensalidade($rs['idMensalidade']);
			$listMensalidade[$cont]->setMatriculaAluno($rs['matricula']);
            $listMensalidade[$cont]->setAluno($rs['nome']);
            $listMensalidade[$cont]->setCpf($rs['cpf']);
			$listMensalidade[$cont]->setValor($rs['valor']);
            $listMensalidade[$cont]->setDtVencimento($rs['dtVencimento']);
			$listMensalidade[$cont]->setValorCurso($rs['valorCurso']);

            $cont += 1;
        }
        return $listMensalidade;
        $conex->closeDatabase();
	}

}

?>

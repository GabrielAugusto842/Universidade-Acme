<?php
/*
    Projeto: Universidade ACME área do professor
    Autor: Alcateck
    Data: 30/11/2018
    Objetivo: Manipulação do banco de dados na área de respostas de professores

    Editado por: Gabriel
    Data  da alteração: 30/11/2018
    Conteudo alterado: insert

*/

class respostaProfessorDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova respostaProfessor no BD
    public function insert(RespostaProfessor $respostaProfessor){
        $sql = "insert into tbl_respostaprofessor (idProfessor, resposta) values(
        ".$respostaProfessor->getMatriculaProfessor().", '".$respostaProfessor->getResposta()."')";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)){
            echo "Inserido com sucesso";
			$lastId = $PDO_conex->lastInsertId();
			
			$sqlRel = "insert into tbl_respostaprofessor_perguntaaluno (idRespostaProfessor,idPerguntaAluno) values($lastId,".$respostaAluno->getIdPerguntaAluno().")";
			
			if ($PDO_conex->query($sqlRel))
            	echo "Inserido com sucesso";
			else
				echo("Erro no script do insert");
			
		}else{
            echo("Erro no script do insert");
		}
		
        $conex->closeDatabase();
    }

    //Listar todas as respostas de alunos de uma determinada pergunta de aluno do BD
    public function selectAll($idPergunta){
        $sql = "select * from vw_perguntaaluno_respostaaluno where idPerguntaAluno =".$idPergunta;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listRespostaAluno = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe respostaAluno
            $listRespostaAluno[] = new respostaAluno();
            $listRespostaAluno[$cont]->setIdPerguntaAluno($rs['idPerguntaAluno']);
            $listRespostaAluno[$cont]->setIdPostador($rs['postador']);
            $listRespostaAluno[$cont]->setIdRespostaAluno($rs['idRespostaAluno']);
            $listRespostaAluno[$cont]->setResposta($rs['resposta']);
            $listRespostaAluno[$cont]->setMatriculaAluno($rs['comentador']);
            $listRespostaAluno[$cont]->setAluno($rs['nome']);

            $cont += 1;
        }
        return $listRespostaAluno;
        $conex->closeDatabase();
    }

}

?>

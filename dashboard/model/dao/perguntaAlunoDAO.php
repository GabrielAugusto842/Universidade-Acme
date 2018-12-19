<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 15/11/2018
    Objetivo: Manipulação do banco de dados na área de perguntas de alunos

    Editado por: Gabriel
    Data  da alteração: 15/11/2018
    Conteudo alterado: insert

*/

class perguntaAlunoDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova perguntaAluno no BD
    public function insert(PerguntaAluno $perguntaAluno){
		
		if($perguntaAluno->getMatriculaDirecionado() != 0){
			
			$sql = "insert into tbl_perguntaaluno (texto, matricula, idForum) values(
        '".$perguntaAluno->getTexto()."', ".$perguntaAluno->getMatriculaAluno().", ".$perguntaAluno->getIdForum().")";
			
		}else{
			
			$sql = "insert into tbl_perguntaaluno (texto, matricula, idForum) values(
        '".$perguntaAluno->getTexto()."', ".$perguntaAluno->getMatriculaAluno().", ".$perguntaAluno->getIdForum().")";
			
		}
		
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Listar todas as perguntas de Alunos do BD
    public function selectAll($idForum){
        $sql = "select * from vw_pergunta_aluno where idForum =".$idForum." order by idPerguntaAluno desc";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listPerguntaAluno = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe perguntaAluno
            $listPerguntaAluno[] = new perguntaAluno();
            $listPerguntaAluno[$cont]->setIdPerguntaAluno($rs['idPerguntaAluno']);
            $listPerguntaAluno[$cont]->setNomeAluno($rs['nome']);
            $listPerguntaAluno[$cont]->setMatriculaAluno($rs['matricula']);
            $listPerguntaAluno[$cont]->setIdForum($rs['idForum']);
            $listPerguntaAluno[$cont]->setTexto($rs['texto']);
			$listPerguntaAluno[$cont]->setFoto($rs['foto']);

            $cont += 1;
        }
        return $listPerguntaAluno;
        $conex->closeDatabase();
    }

}

?>

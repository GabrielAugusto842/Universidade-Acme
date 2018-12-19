<?php
/*
    Projeto: Universidade ACME área do professor
    Autor: Alcateck
    Data: 30/11/2018
    Objetivo: Manipulação do banco de dados na área de perguntas de professor

    Editado por: Gabriel
    Data  da alteração: 30/11/2018
    Conteudo alterado: insert

*/

class perguntaProfessorDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova perguntaProfessor no BD
    public function insert(PerguntaProfessor $perguntaProfessor){
	
		$sql = "insert into tbl_perguntaprofessor (texto, idProfessor, idForum) values(
		'".$perguntaProfessor->getTexto()."', ".$perguntaProfessor->getMatriculaProfessor().", ".$perguntaProfessor->getIdForum().")";
		
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

            $cont += 1;
        }
        return $listPerguntaAluno;
        $conex->closeDatabase();
    }

}

?>

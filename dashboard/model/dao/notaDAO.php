<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 09/11/2018
    Objetivo: Manipulação do banco de dados na área de notas

    Editado por: Gabriel
    Data  da alteração: 09/11/2018
    Conteudo alterado: insert, update, delete, selectAll e selectById

*/

class notaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova nota no BD
    public function insert(Nota $nota){
        $sql = "insert into tbl_nota (matricula, idDisciplina, nota, idProfessor) values(
        ".$nota->getMatriculaAluno().", ".$nota->getIdDisciplina().", '".$nota->getNota()."', ".$nota->getIdProfessor().")";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

	//Atualizar nota no BD
    public function update(Nota $nota) {
        $sql = "update tbl_nota set matricula = ".$nota->getMatriculaAluno().", idDisciplina = ".$nota->getIdDisciplina().",
		nota = '".$nota->getNota()."', idProfessor = ".$nota->getIdProfessor()." where idNota = ".$nota->getIdNota();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Excluir um nota no BD
    public function delete($id){
        $sql = "delete from tbl_nota where idNota =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todas as notas do BD
    public function selectAll(){
        $sql = "select * from tbl_nota";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listNota = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe nota
            $listNota[] = new nota();
            $listNota[$cont]->setIdNota($rs['idNota']);
            $listNota[$cont]->setMatriculaAluno($rs['matricula']);
            $listNota[$cont]->setIdDisciplina($rs['idDisciplina']);
            $listNota[$cont]->setNota($rs['nota']);
            $listNota[$cont]->setIdProfessor($rs['idProfessor']);

            $cont += 1;
        }
        return $listNota;
        $conex->closeDatabase();
    }

    //Listar um post no BD
    public function selectById($id){
        $sql = "select * from tbl_nota where idNota =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listNota = new nota();

            $listNota->setIdNota($rs['idTrabalho']);
            $listNota->setMatriculaAluno($rs['matricula']);
            $listNota->setIdDisciplina($rs['idDisciplina']);
            $listNota->setNota($rs['nota']);
            $listNota->setIdProfessor($rs['idProfessor']);

            return $listNota;
        }
    }

    //Listar todas as notas de um usuário do BD
    public function selectByAluno($matricula){
        $sql = "select * from vw_nota where matricula =".$matricula;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listNota = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe nota
            $listNota[] = new nota();
            $listNota[$cont]->setIdNota($rs['idNota']);
            $listNota[$cont]->setMatriculaAluno($rs['matricula']);
            $listNota[$cont]->setDisciplina($rs['disciplina']);
            $listNota[$cont]->setNota($rs['nota']);
            $listNota[$cont]->setProfessor($rs['professor']);

            $cont += 1;
        }
        return $listNota;
        $conex->closeDatabase();
    }

}

?>

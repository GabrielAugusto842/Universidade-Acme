<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 29/10/2018
    Objetivo: Manipulação do banco de dados na área de presenças

    Editado por: Gabriel
    Data  da alteração: 31/10/2018
    Conteudo alterado: insert, update, selectAll e selectById

*/

class presencaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova presenca no BD
    public function insert(Presenca $presenca){
        $sql = "insert into tbl_presenca (idAula, matricula, presenca) values(
        lastInsertId(), ".$presenca->getMatriculaAluno().",".$presenca->getPresenca().")";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Atualizar presenca no BD
    public function update(Presenca $presenca) {
        $sql = "update tbl_presenca set idAula = lastInsertId(), matricula = ".$presenca->getMatriculaAluno().", presenca = ".$presenca->getPresenca()."
         where idPresenca = ".$presenca->getIdPresenca();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Listar todas as presenças do BD
    public function selectAll(){
        $sql = "select * from tbl_presenca";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listPresenca = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe presenca
            $listPresenca[] = new presenca();
            $listPresenca[$cont]->setIdPresenca($rs['idPresenca']);
            // $listPresenca[$cont]->setNome($rs['idAula']);
            $listPresenca[$cont]->setMatriculaAluno($rs['matricula']);
            $listPresenca[$cont]->setPresenca($rs['presenca']);

            $cont += 1;
        }
        return $listPresenca;
        $conex->closeDatabase();
    }

    //Listar uma presença no BD
    public function selectById($id){
        $sql = "select * from tbl_presenca where idPresenca =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listPresenca = new presenca();

            $listPresenca->setIdPresenca($rs['idPresenca']);
            // $listPresenca->setNome($rs['idAula']);
            $listPresenca->setMatriculaAluno($rs['matricula']);
            $listPresenca->setPresenca($rs['presenca']);

            return $listPresenca;
        }
    }

}

?>

<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 01/11/2018
    Objetivo: Manipulação do banco de dados na área de trabalhos

    Editado por: Gabriel
    Data  da alteração: 01/11/2018
    Conteudo alterado: insert, update, delete, selectAll e selectById

*/

class trabalhoDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir novo trabalho no BD
    public function insert(Trabalho $trabalho){
        $sql = "insert into tbl_trabalho (arquivo, idEntrega, data, matricula) values(
        '".$trabalho->getArquivo()."', ".$trabalho->getIdEntrega().", '".$trabalho->getData()."', ".$trabalho->getMatriculaAluno().")";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Listar todos os trabalhos do BD
    public function selectAll(){
        $sql = "select * from tbl_trabalho";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listTrabalho = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe trabalho
            $listTrabalho[] = new trabalho();
            $listTrabalho[$cont]->setIdTrabalho($rs['idTrabalho']);
            $listTrabalho[$cont]->setArquivo($rs['arquivo']);
            $listTrabalho[$cont]->setIdEntrega($rs['idEntrega']);
            $listTrabalho[$cont]->setData($rs['data']);
            $listTrabalho[$cont]->setMatriculaAluno($rs['matricula']);

            $cont += 1;
        }
        return $listTrabalho;
        $conex->closeDatabase();
    }

    //Listar um trabalho no BD
    public function selectById($id){
        $sql = "select * from tbl_trabalho where idTrabalho =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listTrabalho = new trabalho();

            $listTrabalho->setIdTrabalho($rs['idTrabalho']);
            $listTrabalho->setArquivo($rs['arquivo']);
            $listTrabalho->setIdEntrega($rs['idEntrega']);
            $listTrabalho->setData($rs['data']);
            $listTrabalho->setMatriculaAluno($rs['matricula']);

            return $listTrabalho;
        }
    }
	
	//Listar todos os trabalhos de um professor do BD
    public function selectByProfessor($idProfessor){
        $sql = "select * from vw_entrega_trabalho where idProfessor = ".$idProfessor;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listTrabalho = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe trabalho
            $listTrabalho[] = new trabalho();
            $listTrabalho[$cont]->setIdEntrega($rs['idEntrega']);
            $listTrabalho[$cont]->setTitulo($rs['titulo']);
            $listTrabalho[$cont]->setDisciplina($rs['disciplina']);
            $listTrabalho[$cont]->setMatriculaProfessor($rs['idProfessor']);
            $listTrabalho[$cont]->setInstrucoes($rs['instrucoes']);
			$listTrabalho[$cont]->setDataFinal($rs['dataFinal']);
            $listTrabalho[$cont]->setIdTrabalho($rs['idTrabalho']);
            $listTrabalho[$cont]->setAluno($rs['aluno']);
            $listTrabalho[$cont]->setArquivo($rs['trabalho']);
            $listTrabalho[$cont]->setData($rs['dataEntrega']);

            $cont += 1;
        }
        return $listTrabalho;
        $conex->closeDatabase();
    }
	
	//Listar um trabalho de um professor no BD
    public function selectByProfessorAndId($idProfessor, $id){
        $sql = "select * from vw_entrega_trabalho where idProfessor = ".$idProfessor." and idTrabalho =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listTrabalho = new trabalho();

            $listTrabalho->setIdEntrega($rs['idEntrega']);
            $listTrabalho->setTitulo($rs['titulo']);
            $listTrabalho->setDisciplina($rs['disciplina']);
            $listTrabalho->setMatriculaProfessor($rs['idProfessor']);
            $listTrabalho->setInstrucoes($rs['instrucoes']);
			$listTrabalho->setDataFinal($rs['dataFinal']);
            $listTrabalho->setIdTrabalho($rs['idTrabalho']);
            $listTrabalho->setAluno($rs['aluno']);
            $listTrabalho->setArquivo($rs['trabalho']);
            $listTrabalho->setData($rs['dataEntrega']);

            return $listTrabalho;
        }
    }

}

?>

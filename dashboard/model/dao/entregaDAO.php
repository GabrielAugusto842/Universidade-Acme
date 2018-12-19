<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 01/11/2018
    Objetivo: Manipulação do banco de dados na área de entregas

    Editado por: Gabriel
    Data  da alteração: 01/11/2018
    Conteudo alterado: insert, update, delete, selectAll e selectById

*/

class entregaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova entrega no BD
    public function insert(Entrega $entrega){
        $sql = "insert into tbl_entrega (titulo, arquivo, idDisciplina, data) values(
        '".$entrega->getTitulo()."', '".$entrega->getArquivo()."', ".$entrega->getIdDisciplina().", '".$entrega->getData()."')";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Inserido com sucesso";
			$lastId = $PDO_conex->lastInsertId();
			
			$sqlRel = "insert into tbl_entrega_aluno (idEntrega,matricula) values($lastId,".$entrega->getMatriculaAluno().")";
			
			if ($PDO_conex->query($sqlRel))
            	echo "Inserido com sucesso";
			else
				echo("Erro no script do insert");
		} else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Atualizar entrega no BD
    public function update(Entrega $entrega) {
        $sql = "update tbl_entrega set titulo = '".$entrega->getTitulo()."', arquivo = '".$entrega->getArquivo()."',
        idDisciplina = '".$entrega->getIdDisciplina()."', data = '".$entrega->getData()."'
        where idEntrega = ".$entrega->getIdEntrega();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Excluir uma entrega no BD
    public function delete($id){
        $sql = "delete from tbl_entrega where idEntrega =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todas as entregas do BD
    public function selectAll(){
        $sql = "select * from tbl_entrega";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listEntrega = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe entrega
            $listEntrega[] = new entrega();
            $listEntrega[$cont]->setIdEntrega($rs['idEntrega']);
            $listEntrega[$cont]->setTitulo($rs['titulo']);
            $listEntrega[$cont]->setArquivo($rs['arquivo']);
            $listEntrega[$cont]->setIdDisciplina($rs['idDisciplina']);
            $listEntrega[$cont]->setData($rs['data']);

            $cont += 1;
        }
        return $listEntrega;
        $conex->closeDatabase();
    }

    //Listar uma entrega no BD
    public function selectById($id){
        $sql = "select * from tbl_entrega where idEntrega =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listEntrega = new entrega();

            $listEntrega->setIdEntrega($rs['idEntrega']);
            $listEntrega->setTitulo($rs['titulo']);
            $listEntrega->setArquivo($rs['arquivo']);
            $listEntrega->setIdDisciplina($rs['idDisciplina']);
            $listEntrega->setData($rs['data']);

            return $listEntrega;
        }
    }
	
	//Listar entregas de um aluno no BD
	public function selectByAluno($matricula){
		$sql = "select * from vw_entrega where matricula =".$matricula;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listEntrega = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe entrega
            $listEntrega[] = new entrega();
            $listEntrega[$cont]->setIdEntrega($rs['idEntrega']);
			$listEntrega[$cont]->setMatriculaAluno($rs['matricula']);
            $listEntrega[$cont]->setTitulo($rs['titulo']);
            $listEntrega[$cont]->setArquivo($rs['arquivo']);
			$listEntrega[$cont]->setData($rs['data']);
            $listEntrega[$cont]->setDisciplina($rs['disciplina']);
			$listEntrega[$cont]->setProfessor($rs['professor']);

            $cont += 1;
        }
        return $listEntrega;
        $conex->closeDatabase();
	}
	
	//Listar entregas de um aluno pelo Id no BD
	public function selectByAlunoAndId($matricula, $id){
        $sql = "select * from vw_entrega where matricula = ".$matricula." and idEntrega =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listEntrega = new entrega();

            $listEntrega->setTitulo($rs['titulo']);
            $listEntrega->setArquivo($rs['arquivo']);
			$data = $rs['data'];
			$dt = explode("-", $data);
			$data = $dt[2]."/".$dt[1]."/".$dt[0];
            $listEntrega->setData($data);
			$listEntrega->setDisciplina($rs['disciplina']);
			$listEntrega->setProfessor($rs['professor']);

            return $listEntrega;
        }
    }

}

?>

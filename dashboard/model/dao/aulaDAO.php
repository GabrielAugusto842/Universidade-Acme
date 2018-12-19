<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 29/10/2018
    Objetivo: Manipulação do banco de dados na área de aulas

    Editado por: Gabriel
    Data  da alteração: 29/10/2018
    Conteudo alterado: insert

*/

class aulaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova aula no BD
    public function insert(Aula $aula){
        $sql = "insert into tbl_aula (idTurma, idDisciplina, dia, matricula) values(
        ".$aula->getIdTurma().",".$aula->getIdDisciplina().",'".$aula->getData()."',".$aula->getMatriculaProfessor().")";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Listar aulas de um aluno no BD
	public function selectByAluno($matricula){
		$sql = "select * from vw_aula where matricula =".$matricula;

		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listAula = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe aula
            $listAula[] = new aula();
			$data = $rs['dia'];
			$dt = explode("-", $data);
			$data = $dt[2]."/".$dt[1]."/".$dt[0];
            $listAula[$cont]->setData($data);
			$listAula[$cont]->setDisciplina($rs['nome']);
			$presenca = $rs['presenca'];
			if ($presenca)
				$presenca = "Presente";
			else
				$presenca = "Faltou";
            $listAula[$cont]->setPresenca($presenca);

            $cont += 1;
        }
        return $listAula;
        $conex->closeDatabase();
	}

}

?>

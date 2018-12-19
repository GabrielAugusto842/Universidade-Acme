<?php
/*
    Projeto: Universidade ACME área do professor
    Autor: Alcateck
    Data: 30/11/2018
    Objetivo: Manipulação do banco de dados na área de disciplinas

    Editado por: Gabriel
    Data  da alteração: 30/11/2018
    Conteudo alterado: selectByCurso

*/

class disciplinaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }
	
	//Listar disciplinas de um curso no BD
	public function selectByCurso($idCurso){
		$sql = "select * from vw_disciplina_curso where idCurso =".$idCurso;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listDisciplina = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe disciplina
            $listDisciplina[] = new disciplina();
            $listDisciplina[$cont]->setIdCurso($rs['idCurso']);
			$listDisciplina[$cont]->setCurso($rs['curso']);
            $listDisciplina[$cont]->setidDisciplina($rs['idDisciplina']);
            $listDisciplina[$cont]->setDisciplina($rs['disciplina']);

            $cont += 1;
        }
        return $listDisciplina;
        $conex->closeDatabase();
	}
	
}
<?php
/*
    Projeto: Universidade ACME área do professor
    Autor: Alcateck
    Data: 30/11/2018
    Objetivo: Manipulação do banco de dados na área de turmas

    Editado por: Gabriel
    Data  da alteração: 30/11/2018
    Conteudo alterado: selectByCurso

*/

class turmaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }
	
	//Listar turmas de um curso no BD
	public function selectByCurso($idCurso){
		$sql = "select * from vw_turma_curso where idCurso =".$idCurso;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listTurma = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe turma
            $listTurma[] = new turma();
            $listTurma[$cont]->setIdCurso($rs['idCurso']);
			$listTurma[$cont]->setCurso($rs['curso']);
            $listTurma[$cont]->setidTurma($rs['idTurma']);
            $listTurma[$cont]->setTurma($rs['turma']);

            $cont += 1;
        }
        return $listTurma;
        $conex->closeDatabase();
	}
	
}
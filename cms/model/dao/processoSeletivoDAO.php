<?php
/*
    Projeto: Universidade ACME cms
    Autor: alcateck
    Data: 20/10/2018
    Objetivo: Manipulação do banco de dados na área de processo seletivo

    Editado por:
    Data  da alteração:
    Conteudo alterado:
	
	*em alteração por gabriel*
*/

class ProcessoSeletivoDAO {
	public function __construct(){
    	require_once('bdClass.php');
    }
	
	//Atualizar um processo seletivo do BD
	public function update(ProcessoSeletivo $pseletivo){
		$sql = "update tbl_psseletivo set arquivo = '".$pseletivo->getArquivo()."' where idPSeletivo = ".$pseletivo->getIdPSeletivo();

		$conex = new conexaoMySql();
			$PDO_conex = $conex->conectDatabase();

			if ($PDO_conex->query($sql))
				echo("Alterado com sucesso");
			else
				echo("Erro no script de update");

			$conex->closeDatabase();
	}
	
	//Listar um processo seletivo do BD
	public function selectById($id){
		$sql = "select * from tbl_psseletivo where idPSeletivo =".$id;

		$conex = new conexaoMySql();
		$PDO_conex = $conex->conectDatabase();

		$select = $PDO_conex->query($sql);

		if ($rs = $select->fetch(PDO::FETCH_ASSOC)){

			$listProcessoSeletivo =  new ProcessoSeletivo();

			$listProcessoSeletivo->setIdPSeletivo($rs['idPSeletivo']);
			$listProcessoSeletivo->setArquivo($rs['arquivo']);

			return $listProcessoSeletivo;
		}

	}
}
?>
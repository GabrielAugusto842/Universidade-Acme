<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 19/09/2018
    Objetivo: Manipulação do banco de dados na área de avaliações

    Editado por:
    Data  da alteração:
    Conteudo alterado:q

*/

/**
 *
 */
class avaliacaoDAO{

    function __construct(){
        require_once("bdClass.php");
    }
	
   public function insert(Avaliacao $avaliacao){
            $sql = "insert into tbl_avaliacao (nome, email, comentario, avaliacao, data, status) values('".$avaliacao->getNome()."', '".$avaliacao->getEmail()."', '".$avaliacao->getComentario()."',".$avaliacao->getAvaliacao().",'".$avaliacao->getData()."',
			".$avaliacao->getStatus().")";

			$conex = new conexaoMySql();
			$PDO_conex = $conex->conectDatabase();

			if ($PDO_conex->query($sql))
				echo("Inserido com sucesso");
			else
				echo("Erro no script de Insert");
				echo($sql);

			$conex->closeDatabase();

        }
		
    //Excluir avaliação do DB
    public function delete($id){
        $sql = "delete from tbl_avaliacao where idAvaliacao =".$id;
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script do delete";
        }
        $PDO_conex->closeDatabase();
    }

    //Listar todas as avaliações do DB
    public function selectAll(){
        $sql = "select * from tbl_avaliacao";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listAvaliacao = null;

        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listAvaliacao[] = new Avaliacao();
            $listAvaliacao[$cont]->setIdAvaliacao($rs['idAvaliacao']);
            $listAvaliacao[$cont]->setNome($rs['nome']);
            $listAvaliacao[$cont]->setEmail($rs['email']);
            $listAvaliacao[$cont]->setComentario($rs['comentario']);
            $listAvaliacao[$cont]->setAvaliacao($rs['avaliacao']);
            $listAvaliacao[$cont]->setData($rs['data']);
			$listAvaliacao[$cont]->setStatus($rs['status']);

            $cont+=1;
        }
        return $listAvaliacao;
    }

    //Buscar uma avaliação no DB
    public function selectById($id){
        $sql = "select * from tbl_avaliacao where idAvaliacao =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listAvaliacao = new Avaliacao();

            $listAvaliacao->setIdAvaliacao($rs['idAvaliacao']);
            $listAvaliacao->setNome($rs['nome']);
            $listAvaliacao->setEmail($rs['email']);
            $listAvaliacao->setComentario($rs['comentario']);
            $listAvaliacao->setAvaliacao($rs['avaliacao']);
            $listAvaliacao->setData($rs['data']);
			$listAvaliacao->setStatus($rs['status']);

            return $listAvaliacao;
        }
    }
	
	//Ativar ou desativar avaliação
	public function active($id, $status) {
		if ($status == 1)
			$status = 0;
		else
			$status = 1;
		
		$sql = "update tbl_avaliacao set status =".$status." where idAvaliacao =".$id;
		
		$conex = new conexaoMySql();
		$PDO_conex = $conex->conectDatabase();

		if ($PDO_conex->query($sql))
			echo("Status atualizado com sucesso");
		else
			echo("Erro no script de active");
			echo($sql);

		$conex->closeDatabase();
	}
	

}


?>

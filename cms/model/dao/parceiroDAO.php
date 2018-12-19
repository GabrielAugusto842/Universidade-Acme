<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 17/10/2018
    Objetivo: Manipulação no banco sobre os parceiros

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class parceiroDAO{
	
	public function __construct(){
		require_once('bdClass.php');
	}
	
	public function Insert(Parceiro $parceiro){
		
		$sql="insert into tbl_parceiro(nome, `desc`, img)
		values('".$parceiro->getNome()."','".$parceiro->getDesc()."','".$parceiro->getImg()."');";
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo "Erro no script de Insert";
            echo($sql);

        $conex->closeDatabase();
		
	}
	
	
	public function Update(Parceiro $parceiro){
		
		$sql="update tbl_parceiro set nome = '".$parceiro->getNome()."', `desc` = '".$parceiro->getDesc()."', 
		img = '".$parceiro->getImg()."' where idParceiro = " .$parceiro->getIdParceiro();
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
		
		
	}
	
	public function Delete($id){
		
		$sql="delete from tbl_parceiro where idParceiro = " .$id;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluido com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
		
	}
	
	public function SelectAll(){
		
		$sql="select * from tbl_parceiro";
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listP = null;
		
		while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
			
			$listP[] = new Parceiro();
			
			$listP[$cont]->setNome($rs['nome']);
			$listP[$cont]->setDesc($rs['desc']);
			$listP[$cont]->setImg($rs['img']);
			$listP[$cont]->setIdParceiro($rs['idParceiro']);
			
			$cont += 1;
			
		}
		
		return $listP;
		$conex->closeDatabase();
	}
	
	
	public function SelectById($id){
		
		$sql = "select * from tbl_parceiro where idParceiro =".$id;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);
		
		if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            
			$listP = new Parceiro();
			
            $listP->setIdParceiro($id);
			$listP->setNome($rs['nome']);
			$listP->setDesc($rs['desc']);
			$listP->setImg($rs['img']);
			$listP->setIdParceiro($rs['idParceiro']);

            return $listP;
        }
		
		
	}
	
	
}

?>
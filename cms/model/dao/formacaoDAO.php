<?php
/*
    Projeto: Universidade ACME CMS
    Autor: Vitor
    Data: 09/10/2018
    Objetivo: Manipular formação

    Editado por: Gustavo
    Data  da alteração:
    Conteudo alterado:

*/
class FormacaoDAO{
	
	public function __construct(){
		require_once('bdClass.php');
	}
	
	public function insert(Formacao $formacao){
		
		$sql= "insert into tbl_formacao(nome, `desc`)
		values ('".$formacao->getNome()."', '".$formacao->getDesc()."')";
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");

        $conex->closeDatabase();
		
	}
	
	public function update(Formacao $formacao){
		
		$sql= "update tbl_formacao set nome = '".$formacao->getNome()."',
		tbl_formacao.desc = '".$formacao->getDesc()."'where idFormacao = ".$formacao->getIdFormacao();
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();
		

        if ($PDO_conex->query($sql))
            echo("Alterado com sucesso");
        else
            echo("Erro no script de update");

        $conex->closeDatabase();
	}
	
	public function delete($id){
		$sql = "delete from tbl_formacao where idFormacao =".$id;
		$conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                echo("excluido com sucesso");
            else
                echo("Erro no script de delete");

            $conex->closeDatabase();
	}
	
	public function SelectAll(){
		$sql = "select * from tbl_formacao";
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);
		$cont = 0;
		$list = null;
		while($rs = $select->fetch(PDO::FETCH_ASSOC)){
		
			$list[] = new Formacao();
            $list[$cont]->setIdFormacao($rs['idFormacao']);
			$list[$cont]->setNome($rs['nome']);
			$list[$cont]->setDesc($rs['desc']);
			
			
			$cont += 1;
	   }
		return $list;
		
        $conex->closeDatabase();
		
	}
	
	public function selectById($id){
		$sql= "select * from tbl_formacao where idFormacao=".$id;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);
		
		if ($rs = $select->fetch(PDO::FETCH_ASSOC)){
			
			$list = new Formacao();
			$list->setNome($rs['nome']);
			$list->setDesc($rs['desc']);
			$list->setIdFormacao($rs['idFormacao']);
			
			return $list;
		}
		
		$conex->closeDatabase();
		
	}
		
		
}



?>
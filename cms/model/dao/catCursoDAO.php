<?php
/*
    Projeto: Universidade ACME CMS
    Autor: Vitor
    Data: 10/10/2018
    Objetivo: 

    Editado por: Gustavo
    Data  da alteração:
    Conteudo alterado:
	
	*Em alteração*

*/

class CatCursoDAO{
	
	public function __construct(){
        require_once('bdClass.php');
	}
	
	public function insert(CatCurso $catCurso){
		
		$sql = "insert into tbl_catcurso (nome) 
		values('".$catCurso->getNome()."')";
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");
        echo($sql);

        $conex->closeDatabase();
	}
	
	public function update (CatCurso $catCurso){
		
		$sql = "update tbl_catcurso set nome = '".$catCurso->getNome()."' where 
		idCategoriaCurso = ".$catCurso->getIdCategoriaCurso();
        echo($sql);
			
		 $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Alterado com sucesso");
        else
            echo("Erro no script de update");

        $conex->closeDatabase();
		
	}
	
	public function delete($id){
		
		$sql = "delete from tbl_catcurso where idCategoriaCurso =".$id;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

       if ($PDO_conex->query($sql))
            echo("excluido com sucesso");
       else
       echo("Erro no script de delete");

       $conex->closeDatabase();
		
	}
	
	public function selectAll(){
		
		$sql = "select * from tbl_catcurso";
		
		$conex = new conexaoMySql();
            
		$PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);
        $cont = 0;
        $listCat = null;
        while($rs = $select->fetch(PDO::FETCH_ASSOC)){
			
			$listCat[] = new CatCurso();
			$listCat[$cont]->setIdCategoriaCurso($rs['idCategoriaCurso']);
			$listCat[$cont]->setNome($rs['nome']);
			
			$cont += 1;			
		}
		
		return $listCat;
		
		$conex->closeDatabase();
		
	}
	
	public function selectById($id){
		
		$sql = "select * from tbl_catcurso where idCategoriaCurso=".$id;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);
		
		if ($rs = $select->fetch(PDO::FETCH_ASSOC)){
			
			$listCat = new CatCurso();
			$listCat->setIdCategoriaCurso($rs['idCategoriaCurso']);
			$listCat->setNome($rs['nome']);
			
			return $listCat;
		}
		
		 $conex->closeDatabase();
	}
	
}



?>
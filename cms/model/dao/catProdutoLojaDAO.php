<?php

class CatProdutoLojaDAO{
	
    public function __construct(){
        require_once('bdClass.php');
    }
    
    public function insert(CatProdutoLoja $catProdutoLoja){
        
        $sql = "insert into tbl_catprodutoloja(`titulo`, `desc`) values('".$catProdutoLoja->getTitulo()."','".$catProdutoLoja->getDesc()."')";
        
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");

        $conex->closeDatabase();
        
    }
	
	public function update(CatProdutoLoja $catProdutoLoja){
        
        $sql = "update tbl_catprodutoloja set titulo = '".$catProdutoLoja->getTitulo()."', tbl_catprodutoloja.desc = '".$catProdutoLoja->getDesc()."' where idCatProduto =".$catProdutoLoja->getIdCatProduto();
        
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");

        $conex->closeDatabase();
        
    }
	
	public function delete($id){
		
		$sql = "delete from tbl_catprodutoloja where idCatProduto =".$id;
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

       if ($PDO_conex->query($sql))
            echo("excluido com sucesso");
       else
       echo("Erro no script de delete");

       $conex->closeDatabase();
		
	}
    
   public function selectAll(){
        $sql = "select * from tbl_catprodutoloja order by titulo";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listAvaliacao = null;

        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listCatProdutoLoja[] = new CatProdutoLoja();
            $listCatProdutoLoja[$cont]->setIdCatProduto($rs['idCatProduto']);
            $listCatProdutoLoja[$cont]->setTitulo($rs['titulo']);
            $listCatProdutoLoja[$cont]->setDesc($rs['desc']);

            $cont+=1;
        }
        return $listCatProdutoLoja;
    }
	
	 public function selectById($id){
            $sql = "select * from tbl_catprodutoloja where idCatProduto =".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            if ($rs = $select->fetch(PDO::FETCH_ASSOC)){

				$listCatProdutoLoja = new CatProdutoLoja();
				
				$listCatProdutoLoja->setIdCatProduto($rs['idCatProduto']);
				$listCatProdutoLoja->setTitulo($rs['titulo']);
				$listCatProdutoLoja->setDesc($rs['desc']);
				
          		return $listCatProdutoLoja;
            }


        }
	
}
    
?>
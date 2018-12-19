<?php
/*
    Projeto: Universidade ACME CMS
    Autor: Gustavo
    Data: 29/08/2018
    Objetivo: Manipulação do banco de dados na área de usuarios

    Editado por: 
    Data  da alteração:
    Conteudo alterado:

*/
 class ProdutoLojaDAO{
	
    public function __construct(){
        require_once('bdClass.php');
    }
    
    public function insert(ProdutoLoja $produtoLoja){
        
        $sql = "insert into tbl_produtoloja (titulo, `desc`, preco, img, idCatProduto) values('".$produtoLoja ->getTitulo()."','".$produtoLoja->getDesc()."','".$produtoLoja->getPreco()."','".$produtoLoja->getImg()."',".$produtoLoja->getIdCategoria().")";
        
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");

        $conex->closeDatabase();
        
    }
    
    public function update(ProdutoLoja $produtoLoja){
        
        
        $sql = "update tbl_produtoloja 
        set titulo ='".$produtoLoja->getTitulo()."',
        `desc` = '".$produtoLoja->getDesc()."',
        preco = '".$produtoLoja->getPreco()."',
        img = '".$produtoLoja->getImg()."',
        idCatProduto = ".$produtoLoja->getIdCategoria()." where idProduto = ".$produtoLoja->getIdProduto();
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
            $sql = "delete from tbl_produtoloja where idProduto =".$id;
            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                echo("excluido com sucesso");
            else
                echo("Erro no script de delete");

            $conex->closeDatabase();
    }
    
    public function selectAll(){
            $sql = "select * from tbl_produtoloja";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            $listProdutoLoja = null;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe ProdutoLoja
                
                $listProdutoLoja[] =  new ProdutoLoja();
                $listProdutoLoja[$cont]->setIdProduto($rs['idProduto']);
                $listProdutoLoja[$cont]->setTitulo($rs['titulo']);
                $listProdutoLoja[$cont]->setDesc($rs['desc']);
                $listProdutoLoja[$cont]->setPreco($rs['preco']);
                $listProdutoLoja[$cont]->setImg($rs['img']);
                $listProdutoLoja[$cont]->setIdCategoria($rs['idCatProduto']);
              
                $cont += 1;

            }
		
            return $listProdutoLoja;
		
			$conex->closeDatabase();


        }
    
     public function selectById($id){
            $sql = "select * from tbl_produtoloja where idProduto =".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            if ($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $listProdutoLoja =  new ProdutoLoja();
                $listProdutoLoja->setIdProduto($rs['idProduto']);
                $listProdutoLoja->setTitulo($rs['titulo']);
                $listProdutoLoja->setDesc($rs['desc']);
                $listProdutoLoja->setPreco($rs['preco']);
                $listProdutoLoja->setImg($rs['img']);
                $listProdutoLoja->setIdCategoria($rs['idCatProduto']);

                return $listProdutoLoja;
            }
		 
            $conex->closeDatabase();
        } 
     
     public function selectByCat($idCat){
            $sql = "select produto.idProduto as idProduto, produto.titulo as titulo, produto.desc as `desc`, produto.img as img, produto.preco as preco from tbl_produtoloja as produto inner join tbl_catprodutoloja as cate
                    on produto.idCatProduto = cate.idCatProduto
                    where cate.idCatProduto = ".$idCat."
                    order by cate.titulo;";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            $listProdutoLoja = null;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe ProdutoLoja
                
                $listProdutoLoja[] =  new ProdutoLoja();
                $listProdutoLoja[$cont]->setIdProduto($rs['idProduto']);
                $listProdutoLoja[$cont]->setTitulo($rs['titulo']);
                $listProdutoLoja[$cont]->setDesc($rs['desc']);
                $listProdutoLoja[$cont]->setPreco($rs['preco']);
                $listProdutoLoja[$cont]->setImg($rs['img']);
              
                $cont += 1;

            }
		
            return $listProdutoLoja;
		 
            $conex->closeDatabase();
        }
    
    
    
}


?>
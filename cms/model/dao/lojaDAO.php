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
 class LojaDAO{
	
    public function __construct(){
        require_once('bdClass.php');
    }
    
    public function insert(ProdutoLoja $produtoLoja){
        
        //TODO: fazer insert na tabela de relação entre nivel e pagina
        $sql = "insert into tbl_produtoloja (titulo, desc, preco, img, idCatProduto) vaslues('".$produtoLoja ->getTitulo()."','".$produtoLoja->getDesc()."','".$produtoLoja->getPreco()."','".$produtoLoja->getImg()."','".$produtoLoja->getCategoria()."')";
        
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");

        $conex->closeDatabase();
        
    }
    
    public function update(ProdutoLoja $produtoLoja){
        
        //TODO: fazer update  na tabela de relação entre nivel e pagina
        $sql = "";
        
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
            $sql = "select *from tbl_produtoloja";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            $listNivel = null;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe nivel
                
                $listNivel[] =  new Nivel();
                $listNivel[$cont]->setIdNivel($rs['idNivel']);
                $listNivel[$cont]->setNome($rs['nome']);
              
                $cont += 1;

            }
		
            return $listNivel;
		
			$conex->closeDatabase();


        }
    
     public function selectById($id){
            $sql = "select * from tbl_produtoloja where idProduto =".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            if ($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $listNivel =  new Nivel();
                $listNivel->setIdNivel($rs['idNivel']);
                $listNivel->setNome($rs['nome']);

                return $listNivel;
            }
		 
            $conex->closeDatabase();
        } 
    
    
    
}


?>
<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 03/10/2018
    Objetivo: Manipulação do banco de dados na área de unidade

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class UnidadeDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova unidade no BD
    public function insert(Unidade $unidade){
        $sql = "insert into tbl_unidade(nome, endereco, `desc`, foto) values('".$unidade->getNome()."', '".$unidade->getEndereco()."', '".$unidade->getDesc()."', '".$unidade->getFoto()."')";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo "Erro no script de Insert";

        $conex->closeDatabase();
    }

    //Atualizar unidade no BD
    public function update(Unidade $unidade) {
        $sql = "update tbl_unidade set nome = '".$unidade->getNome()."', endereco = '".$unidade->getEndereco()."', `desc` = '".$unidade->getDesc()."', foto = '".$unidade->getFoto()."' where idUnidade = ".$unidade->getIdUnidade();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Excluir unidade no BD
    public function delete($id){
        $sql = "delete from tbl_unidade where idUnidade =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todas as unidades do BD
    public function selectAll(){
        $sql = "select * from tbl_unidade";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listUnidade = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe unidade
            $listUnidade[] = new Unidade();
            $listUnidade[$cont]->setIdUnidade($rs['idUnidade']);
            $listUnidade[$cont]->setNome($rs['nome']);
            $listUnidade[$cont]->setEndereco($rs['endereco']);
            $listUnidade[$cont]->setDesc($rs['desc']);
            $listUnidade[$cont]->setFoto($rs['foto']);

            $cont += 1;
        }
        return $listUnidade;
        $conex->closeDatabase();
    }

    //Listar uma unidade no BD
    public function selectById($id){
        $sql = "select * from tbl_unidade where idUnidade =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listUnidade = new Unidade();

            $listUnidade->setIdUnidade($rs['idUnidade']);
            $listUnidade->setNome($rs['nome']);
            $listUnidade->setEndereco($rs['endereco']);
            $listUnidade->setDesc($rs['desc']);
			$listUnidade->setFoto($rs['foto']);

            return $listUnidade;
        }
    }
}
?>

<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 27/09/2018
    Objetivo: Manipulação do banco de dados na área de noticias

    Editado por:
    Data  da alteração:
    Conteudo alterado:

     *Em alteração por Gabriel*

*/

class NoticiaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir novo noticia no BD
    public function insert(Noticia $noticia){
        
        $sql = "insert into tbl_noticia(titulo, tbl_noticia.desc , foto, inicio, termino) values('".$noticia->getTitulo()."','".$noticia->getDesc()."','".$noticia->getFoto()."','".$noticia->getInicio()."','".$noticia->getTermino()."')";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo "Erro no script de Insert";

        $conex->closeDatabase();
    }

    //Atualizar noticia no BD
    public function update(Noticia $noticia) {
        $sql = "update tbl_noticia set titulo = '".$noticia->getTitulo()."', tbl_noticia.desc = '".$noticia->getDesc()."', foto = '".$noticia->getFoto()."', inicio = '".$noticia->getInicio()."', termino = '".$noticia->getTermino()."' where idNoticia = ".$noticia->getIdNoticia();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Excluir noticia no BD
    public function delete($id){
        $sql = "delete from tbl_noticia where idNoticia =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todos os noticia do BD
    public function selectAll(){
        $sql = "select * from tbl_noticia";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listNoticia = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe noticia
            $listNoticia[] = new Noticia();
            $listNoticia[$cont]->setIdNoticia($rs['idNoticia']);
            $listNoticia[$cont]->setTitulo($rs['titulo']);
            $listNoticia[$cont]->setDesc($rs['desc']);
            $listNoticia[$cont]->setFoto($rs['foto']);
            //Data inicio
            $dataInicio = $rs['inicio'];
            $dtInicio = explode("-", $dataInicio);
            $dataInicio = $dtInicio[2]."/".$dtInicio[1]."/".$dtInicio[0];
            $listNoticia[$cont]->setInicio($dataInicio);
            //Data termino 
            $dataTermino = $rs['termino'];
            $dtTermino = explode("-", $dataTermino);
            $dataTermino = $dtTermino[2]."/".$dtTermino[1]."/".$dtTermino[0];
            $listNoticia[$cont]->setTermino($dataTermino);

            $cont ++;
        }
        return $listNoticia;
        $conex->closeDatabase();
    }

    //Listar um noticia no BD
    public function selectById($id){
        $sql = "select * from tbl_noticia where idNoticia =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listNoticia = new Noticia();

            $listNoticia->setIdNoticia($rs['idNoticia']);
            $listNoticia->setTitulo($rs['titulo']);
            $listNoticia->setDesc($rs['desc']);
            $listNoticia->setFoto($rs['foto']);
            $listNoticia->setInicio($rs['inicio']);
            $listNoticia->setTermino($rs['termino']);

            return $listNoticia;
        }
    }

}

?>

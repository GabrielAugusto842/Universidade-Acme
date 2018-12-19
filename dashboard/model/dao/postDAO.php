<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 01/11/2018
    Objetivo: Manipulação do banco de dados na área de posts

    Editado por: Gabriel
    Data  da alteração: 01/11/2018
    Conteudo alterado: insert, delete, selectAll e selectById

*/

class postDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir novo post no BD
    public function insert(Post $post){
        $sql = "insert into tbl_post (matricula, idRede, texto, midia) values(
        ".$post->getMatriculaAluno().", ".$post->getIdRede().", '".$post->getTexto()."', '".$post->getMidia()."')";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Atualizar um post no BD
    public function update(Post $post){
        $sql = "update tbl_post set matricula = ".$post->getMatriculaAluno().", idRede = ".$post->getIdRede().",
        texto = '".$post->getTexto()."', midia = '".$post->getMidia()."' where idPost = ".$post->getIdPost();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Atualizado com sucesso";
        else
            echo "Erro no script de update";

        $conex->closeDatabase();

    }

    //Excluir um post no BD
    public function delete($id){
        $sql = "delete from tbl_post where idPost =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todos os posts do BD
    public function selectAll($idRede){
        $sql = "select * from vw_post where idRede =".$idRede." order by idPost desc";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listPost = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe post
            $listPost[] = new post();
            $listPost[$cont]->setIdPost($rs['idPost']);
            $listPost[$cont]->setNomeUsuario($rs['nome']);
            $listPost[$cont]->setFotoUsuario($rs['fotoAluno']);
            $listPost[$cont]->setMatriculaAluno($rs['matricula']);
            $listPost[$cont]->setIdRede($rs['idRede']);
            $listPost[$cont]->setTexto($rs['texto']);
            $listPost[$cont]->setMidia($rs['midia']);

            $cont += 1;
        }
        return $listPost;
        $conex->closeDatabase();
    }

    //Listar um post no BD
    public function selectById($id){
        $sql = "select * from tbl_post where idPost =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listPost = new post();

            $listPost->setIdPost($rs['idPost']);
            $listPost->setMatriculaAluno($rs['matricula']);
            $listPost->setIdRede($rs['idRede']);
            $listPost->setTexto($rs['texto']);
            $listPost->setMidia($rs['midia']);

            return $listPost;
        }
    }

}

?>

<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 02/11/2018
    Objetivo: Manipulação do banco de dados na área de comentários

    Editado por: Gabriel
    Data  da alteração: 02/11/2018
    Conteudo alterado: insert, update, delete, selectAll e selectById

*/

class comentarioDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir novo comentario no BD
    public function insert(Comentario $comentario){
        $sql = "insert into tbl_comentario (matricula, comentario, idPost) values(
        ".$comentario->getMatriculaAluno().", '".$comentario->getComentario()."', ".$comentario->getIdPost().")";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Atualizar comentario no BD
    public function update(Comentario $comentario) {
        $sql = "update tbl_comentario set matricula = ".$comentario->getMatriculaAluno().", comentario = '".$comentario->getComentario()."',
        idPost = ".$comentario->getIdPost()." where idComentario = ".$comentario->getIdComentario();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Excluir um comentario no BD
    public function delete($id){
        $sql = "delete from tbl_comentario where idComentario =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todos os comentarios do BD
    public function selectAll($idPost){
        $sql = "select * from vw_comentario_post where idPost=".$idPost;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();
		
        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listComentario = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe comentario
            $listComentario[] = new comentario();
			$listComentario[$cont]->setIdPost($rs['idPost']);
            $listComentario[$cont]->setPostador($rs['postador']);
            $listComentario[$cont]->setIdComentario($rs['idComentario']);
			$listComentario[$cont]->setComentario($rs['comentario']);
            $listComentario[$cont]->setMatriculaAluno($rs['comentador']);
			$listComentario[$cont]->setNome($rs['nome']);
            $listComentario[$cont]->setFoto($rs['foto']);

            $cont += 1;
        }
        return $listComentario;
        $conex->closeDatabase();
    }

    //Listar um comentario no BD
    public function selectById($id){
        $sql = "select * from tbl_comentario where idComentario =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listComentario = new comentario();

            $listComentario->setIdComentario($rs['idComentario']);
            $listComentario->setMatriculaAluno($rs['matricula']);
            $listComentario->setComentario($rs['comentario']);
            $listComentario->setIdPost($rs['idPost']);

            return $listComentario;
        }
    }

}

?>

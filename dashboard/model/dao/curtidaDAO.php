	<?php
/*
    Projeto: Universidade ACME área do aluno
    Autor: Alcateck
    Data: 02/11/2018
    Objetivo: Manipulação do banco de dados na área de curtidas

    Editado por: Gabriel
    Data  da alteração: 02/11/2018
    Conteudo alterado: insert, delete e selectAll

*/

class curtidaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir nova curtida no BD
    public function insert(Curtida $curtida){
        $sql = "insert into tbl_curtida (matricula, idPost) values(
        ".$curtida->getMatriculaAluno().", ".$curtida->getIdPost().")";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo("Erro no script do insert");

        $conex->closeDatabase();
    }

    //Excluir uma curtida no BD
    public function delete($id){
        $sql = "delete from tbl_curtida where idCurtida =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todas as cutidas do BD
    public function selectAll(){
        $sql = "select * from tbl_curtida";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listCurtida = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe curtida
            $listCurtida[] = new curtida();
            $listCurtida[$cont]->setIdCurtida($rs['idCurtida']);
            $listCurtida[$cont]->setMatriculaAluno($rs['matricula']);
            $listCurtida[$cont]->setIdPost($rs['idPost']);

            $cont += 1;
        }
        return $listCurtida;
        $conex->closeDatabase();
    }
	
	//Listar curtidas de um post no BD
	public function selectByPost($idPost){
        $sql = "select * from vw_curtida where idPost =".$idPost;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listCurtida = new curtida();

            $listCurtida->setQtdCurtida($rs['qtdCurtida']);
			
            return $listCurtida;
        }
    }

}

?>

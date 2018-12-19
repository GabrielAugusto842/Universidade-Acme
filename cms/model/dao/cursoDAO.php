<?php
/*
    Projeto: Universidade ACME CMS
    Autor: Gustavo
    Data: 17/10/2018
    Objetivo: Manipulação do banco de dados na área de cursos

    Editado por: 
    Data  da alteração:
    Conteudo alterado:

*/
class CursoDAO{
    public function __construct(){
        require_once('bdClass.php');
    }

    public function insert(Curso $curso){
        $sql = "insert into tbl_curso set idCatCurso =".$curso->getIdCatCurso().", idFormacao = ".$curso->getIdFormacao().", nome = '".$curso->getNome()."', cargaHoraria = '".$curso->getCargaHoraria()."', grade = '".$curso->getGrade()."', objetivo = '".$curso->getObjetivo()."', descTecnico = '".$curso->getDescTecnico()."', foto = '".$curso->getFoto()."'";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");
        echo($sql);
		
		$sql = "insert into tbl_redesocial (nome, idCurso) values
		('Rede ".$curso->getNome()."', lastInsertId())";
		
		$conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Inserido com sucesso");
        else
            echo("Erro no script de Insert");

        $conex->closeDatabase();
    }

    public function update(Curso $curso){

        $sql = "update tbl_curso set idCatCurso =".$curso->getIdCatCurso().", idFormacao = ".$curso->getIdFormacao().", nome = '".$curso->getNome()."', cargaHoraria = '".$curso->getCargaHoraria()."', grade = '".$curso->getGrade()."', objetivo = '".$curso->getObjetivo()."', descTecnico = '".$curso->getDescTecnico()."', foto = '".$curso->getFoto()."' where idCurso = ".$curso->getIdCurso();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo("Alterado com sucesso");
        else
            echo("Erro no script de update");

        $conex->closeDatabase();
    }

    public function delete($id){
            $sql = "delete from tbl_curso where idCurso =".$id;
            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                echo("excluido com sucesso");
            else
                echo("Erro no script de delete");

            $conex->closeDatabase();
    }

    public function selectAll(){
        $sql = "select * from tbl_curso";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;

        $listCurso = null;

        while($rs = $select->fetch(PDO::FETCH_ASSOC)){

            $listCurso[] = new Curso();
            $listCurso[$cont]->setIdCurso($rs['idCurso']);
            $listCurso[$cont]->setIdCatCurso($rs['idCatCurso']);
            $listCurso[$cont]->setIdFormacao($rs['idFormacao']);
            $listCurso[$cont]->setNome($rs['nome']);
            $listCurso[$cont]->setCargaHoraria($rs['cargaHoraria']);
            $listCurso[$cont]->setGrade($rs['grade']);
            $listCurso[$cont]->setObjetivo($rs['objetivo']);
            $listCurso[$cont]->setDescTecnico($rs['descTecnico']);
            $listCurso[$cont]->setFoto($rs['foto']);

            $cont++;
        }

        return $listCurso;

        $conex->closeDatabase();

    }
	
	public function selectByFormacao($idFormacao){
			$sql = "SELECT curso.idCurso, curso.idCatCurso, curso.idFormacao, curso.nome, curso.cargaHoraria, curso.grade, curso.objetivo, curso.descTecnico, curso.foto FROM tbl_curso as curso
			inner join tbl_formacao as formacao on
			curso.idFormacao = formacao.idFormacao
			where curso.idFormacao =".$idFormacao;
				

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;

        $listCurso = null;
        while($rs = $select->fetch(PDO::FETCH_ASSOC)){

            $listCurso[] = new Curso();
            $listCurso[$cont]->setIdCurso($rs['idCurso']);
            $listCurso[$cont]->setIdCatCurso($rs['idCatCurso']);
            $listCurso[$cont]->setIdFormacao($rs['idFormacao']);
            $listCurso[$cont]->setNome($rs['nome']);
            $listCurso[$cont]->setCargaHoraria($rs['cargaHoraria']);
            $listCurso[$cont]->setGrade($rs['grade']);
            $listCurso[$cont]->setObjetivo($rs['objetivo']);
            $listCurso[$cont]->setDescTecnico($rs['descTecnico']);
            $listCurso[$cont]->setFoto($rs['foto']);

            $cont++;
        }
        return $listCurso;
        $conex->closeDatabase();
	}
	
	

    public function selectById($id){
        $sql = "select * from tbl_curso where idCurso =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)){
            $listCurso = new Curso();
            $listCurso->setIdCurso($rs['idCurso']);
            $listCurso->setIdCatCurso($rs['idCatCurso']);
            $listCurso->setIdFormacao($rs['idFormacao']);
            $listCurso->setNome($rs['nome']);
            $listCurso->setCargaHoraria($rs['cargaHoraria']);
            $listCurso->setGrade($rs['grade']);
            $listCurso->setObjetivo($rs['objetivo']);
            $listCurso->setDescTecnico($rs['descTecnico']);
            $listCurso->setFoto($rs['foto']);

            return $listCurso;
        }

        $conex->closeDatabase();



    }

}



?>

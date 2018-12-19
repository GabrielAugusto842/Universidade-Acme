<?php
/*
    Projeto: Universidade ACME cms
    Autor: alcateck
    Data: 20/10/2018
    Objetivo: Manipulação do banco de dados na área de trabalhe conosoco

    Editado por:
    Data  da alteração:
    Conteudo alterado:
	
	**em alteração por gabriel
*/

class TrabConoscoDAO {
	public function __construct(){
    	require_once('bdClass.php');
    }

	//Inserir novo trabalhe conosco no BD
	public function insert(TrabConosco $trabConosco){
		$sql = "insert into tbl_trabconosco (curriculo,nome,email,dtNasc,telefone,`desc`) values('".$trabConosco->getCurriculo()."','".$trabConosco->getNome()."','".$trabConosco->getEmail()."','".$trabConosco->getDtNasc()."','".$trabConosco->getTelefone()."','".$trabConosco->getDesc()."')";

		$conex = new conexaoMySql();
		$PDO_conex = $conex->conectDatabase();

		if ($PDO_conex->query($sql))
			echo("Inserido com sucesso");
		else
			echo("Erro no script de Insert");

		$conex->closeDatabase();

        }
	
        //Excluir trabalhe conosco do BD
        public function delete($id){
            
            $sql = "delete from tbl_trabconosco where idTrabConosco =".$id;
			
            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                    echo("excluido com sucesso");
            else
                echo("Erro no script de delete");

            $conex->closeDatabase();
        }
        //Listar todos os trabalhe consoco do BD
        public function selectAll(){
            $sql = "select * from tbl_trabconosco";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            $listTrabConosco = null;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe trabConosco

                $listTrabConosco[] =  new TrabConosco();
                $listTrabConosco[$cont]->setIdTrabConosco($rs['idTrabConosco']);
				$listTrabConosco[$cont]->setCurriculo($rs['curriculo']);
                $listTrabConosco[$cont]->setNome($rs['nome']);
                $listTrabConosco[$cont]->setEmail($rs['email']);
                $listTrabConosco[$cont]->setDtNasc($rs['dtNasc']);
                $listTrabConosco[$cont]->setTelefone($rs['telefone']);
                $listTrabConosco[$cont]->setDesc($rs['desc']);

                $cont += 1;

            }
            return $listTrabConosco;
            $conex->closeDatabase();


        }
        //Listar um trabalhe conosco do BD
        public function selectById($id){
            $sql = "select * from tbl_trabconosco where idTrabConosco =".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            if ($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $listTrabConosco =  new TrabConosco();

                $listTrabConosco->setIdTrabConosco($rs['idTrabConosco']);
				$listTrabConosco->setCurriculo($rs['curriculo']);
                $listTrabConosco->setNome($rs['nome']);
                $listTrabConosco->setEmail($rs['email']);
                $listTrabConosco->setDtNasc($rs['dtNasc']);
                $listTrabConosco->setTelefone($rs['telefone']);
                $listTrabConosco->setDesc($rs['desc']);

                return $listTrabConosco;
            }


        }
}
?>
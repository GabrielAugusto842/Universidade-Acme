<?php
/*
    Projeto: Universidade ACME CMS
    Autor: Alcateck
    Data: 19/09/2018
    Objetivo: Manipulação do banco de dados na área de usuarios

    Editado por: Lucas
    Data  da alteração:20/09/2018
    Conteudo alterado:

*/
 class NivelDAO{

    public function __construct(){
        require_once('bdClass.php');
    }

    public function insert(Nivel $nivel){
		
		$ref = null;
		$lastId = null;
		
        //TODO: fazer insert na tabela de relação entre nivel e pagina
        $sql = "insert into tbl_nivel(nome) values('".$nivel->getNome()."')";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)){
            echo("Inserido com sucesso");
			$ref = true;
			$lastId = $PDO_conex->lastInsertId();
		}else{
            echo("Erro no script de Insert");
			$ref = false;
		}
		
        $conex->closeDatabase();
		return array("id" => $lastId, "ref" => $ref);
    }

    public function update(Nivel $nivel){
		
		$ref = null;

        //TODO: fazer update  na tabela de relação entre nivel e pagina
        $sql = "update tbl_nivel set nome = '".$nivel->getNome()."' where idNivel =".$nivel->getIdNivel();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)){
            echo("Alterado com sucesso");
			$ref = true;
		}else{
            echo("Erro no script de update");
			$ref = false;
		}
		
        $conex->closeDatabase();
		return $ref;
    }
	 
	public function cadastrarPermissao($pagina, $id){

        //TODO: fazer update  na tabela de relação entre nivel e pagina
        $sql = "insert into tbl_pagina_nivel (idPagina,idNivel) VALUES($pagina,$id);";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();
		
        if ($PDO_conex->query($sql))
            echo("Alterado com sucesso");
        else
            echo("Erro no script de update");

        $conex->closeDatabase();

    }
	 
	 public function deletarPermissao($id){
		 
		$sql = "delete from tbl_pagina_nivel where idNivel =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();
		
        if ($PDO_conex->query($sql))
            echo("Deletado com sucesso");
        else
            echo("Erro no script de update");

        $conex->closeDatabase();
		 
	 }
	 
	 public function selectPermissao($idUsuario){
            $sql = "select * from vw_nivel_pagina where idUsuario = ".$idUsuario;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            $listNivel = null;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe nivel

                $listNivel[] =  new Nivel();
				$listNivel[$cont]->setIdUsuario($rs['idUsuario']);
                $listNivel[$cont]->setIdNivel($rs['idNivel']);
                $listNivel[$cont]->setPagina($rs['pagina']);

                $cont += 1;

            }
            return $listNivel;

			$conex->closeDatabase();
        }


    public function delete($id){
			$ref = null;
            $sql = "delete from tbl_nivel where idNivel =".$id;
            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql)){
                echo("excluido com sucesso");
				$ref = true;
			}else{
                echo("Erro no script de delete");
				$ref = false;
			}
            $conex->closeDatabase();
    }

    public function selectAll(){
            $sql = "select * from tbl_nivel";

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
            $sql = "select * from tbl_nivel where idNivel =".$id;

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

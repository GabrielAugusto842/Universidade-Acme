<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 27/09/2018
    Objetivo: Manipulação do banco de dados na área de campanhas

    Editado por:
    Data  da alteração:
    Conteudo alterado:

     *Em alteração por Gabriel*

*/

class CampanhaDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Atualizar campanha no BD
    public function update(Campanha $campanha) {
        $sql = "update tbl_campanha set foto = '".$campanha->getFoto()."' where idCampanha = ".$campanha->getIdCampanha();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }
}

?>

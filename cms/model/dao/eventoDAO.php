<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 27/09/2018
    Objetivo: Manipulação do banco de dados na área de eventos

    Editado por: Gustavo
    Data  da alteração:16/10/2018
    Conteudo alterado: Adicionando id da unidade 
	

*/

class EventoDAO {
    public function __construct(){
        require_once('bdClass.php');
    }

    //Inserir novo evento no BD
    public function insert(Evento $evento){
        $sql = "insert into tbl_evento(idUnidade, nome, tbl_evento.desc , foto, inicio, termino) values(".$evento->getIdUnidade().",'".$evento->getNome()."','".$evento->getDesc()."','".$evento->getFoto()."','".$evento->getInicio()."','".$evento->getTermino()."')";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql))
            echo "Inserido com sucesso";
        else
            echo($sql);
//            echo "Erro no script de Insert";

        $conex->closeDatabase();
    }

    //Atualizar evento no BD
    public function update(Evento $evento) {
        $sql = "update tbl_evento set idUnidade = ".$evento->getIdUnidade()." ,nome = '".$evento->getNome()."', tbl_evento.desc = '".$evento->getDesc()."', foto = '".$evento->getFoto()."', inicio = '".$evento->getInicio()."', termino = '".$evento->getTermino()."' where idEvento = ".$evento->getIdEvento();

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Alterado com sucesso";
        } else {
            echo "Erro no script de update";
        }

        $conex->closeDatabase();
    }

    //Excluir evento no BD
    public function delete($id){
        $sql = "delete from tbl_evento where idEvento =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        if ($PDO_conex->query($sql)) {
            echo "Excluído com sucesso";
        } else {
            echo "Erro no script de delete";
        }

        $conex->closeDatabase();
    }

    //Listar todos os eventos do BD
    public function selectAll(){
        $sql = "select * from tbl_evento";

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listEvento = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe evento
            $listEvento[] = new Evento();
            $listEvento[$cont]->setIdEvento($rs['idEvento']);
            $listEvento[$cont]->setIdUnidade($rs['idUnidade']);
            $listEvento[$cont]->setNome($rs['nome']);
            $listEvento[$cont]->setDesc($rs['desc']);
            $listEvento[$cont]->setFoto($rs['foto']);
            //Data Inicio
            $dataInicio = $rs['inicio'];
            $dataTempo = explode(" ",$dataInicio);
            $data = explode("-", $dataTempo[0]);
            $data = $data[2]."/".$data[1]."/".$data[0];
            $tempo = substr($dataTempo[1], 0,-3);
            $dataInicio = $data. " as ". $tempo."H";
            $listEvento[$cont]->setInicio($dataInicio);
            //Data termino
            $dataTermino = $rs['termino'];
            $dataTempo = explode(" ",$dataTermino);
            $data = explode("-", $dataTempo[0]);
            $data = $data[2]."/".$data[1]."/".$data[0];
            $tempo = substr($dataTempo[1], 0,-3);
            $dataTermino = $data. " as ". $tempo."H";
            $listEvento[$cont]->setTermino($dataTermino);

            $cont += 1;
        }
        return $listEvento;
        $conex->closeDatabase();
    }
    public function select3($id){
        
        if($id == 0){
            $sql = "select * from tbl_evento order by rand() limit 3";
        }else{
            $sql = "select * from tbl_evento where idUnidade = ".$id." order by rand() limit 3";
        }
        

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listEvento = null;
        while ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            //Cria um objeto array da classe evento
            $listEvento[] = new Evento();
            $listEvento[$cont]->setIdEvento($rs['idEvento']);
            $listEvento[$cont]->setIdUnidade($rs['idUnidade']);
            $listEvento[$cont]->setNome($rs['nome']);
            $listEvento[$cont]->setDesc($rs['desc']);
            $listEvento[$cont]->setFoto($rs['foto']);
            //Data Inicio
            $dataInicio = $rs['inicio'];
            $dataTempo = explode(" ",$dataInicio);
            $data = explode("-", $dataTempo[0]);
            $data = $data[2]."/".$data[1]."/".$data[0];
            $tempo = substr($dataTempo[1], 0,-3);
            $dataInicio = $data. " as ". $tempo."H";
            $listEvento[$cont]->setInicio($dataInicio);
            //Data termino
            $dataTermino = $rs['termino'];
            $dataTempo = explode(" ",$dataTermino);
            $data = explode("-", $dataTempo[0]);
            $data = $data[2]."/".$data[1]."/".$data[0];
            $tempo = substr($dataTempo[1], 0,-3);
            $dataTermino = $data. " as ". $tempo."H";
            $listEvento[$cont]->setTermino($dataTermino);

            $cont += 1;
        }
        return $listEvento;
        $conex->closeDatabase();
    }

    //Listar um evento no BD
    public function selectById($id){
        $sql = "select * from tbl_evento where idEvento =".$id;

        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        if ($rs = $select->fetch(PDO::FETCH_ASSOC)) {
            $listEvento = new Evento();

            $listEvento->setIdEvento($rs['idEvento']);
            $listEvento->setIdUnidade($rs['idUnidade']);
            $listEvento->setNome($rs['nome']);
            $listEvento->setDesc($rs['desc']);
			$listEvento->setFoto($rs['foto']);
            $listEvento->setInicio($rs['inicio']);
            $listEvento->setTermino($rs['termino']);

            return $listEvento;
        }
    }

}

?>

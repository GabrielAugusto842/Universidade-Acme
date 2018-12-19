
<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 16/10/2018
    Objetivo: Manipulação do banco de dados na área de conteudo do site

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/
    class conteudoDAO{
        public function __construct(){
            require_once('bdClass.php');
        }

         //Inserir novo conteudo no BD
        public function insert(Conteudo $conteudo){
            $sql = "insert into tbl_conteudo (pagina,sessao,conteudo,img) values('".$conteudo->getPagina()."','".$conteudo->getSessao()."','".$conteudo->getConteudo()."','".$conteudo->getFoto()."')";

                $conex = new conexaoMySql();
                $PDO_conex = $conex->conectDatabase();

                if ($PDO_conex->query($sql))
                    echo("Inserido com sucesso");
                else
                    echo("Erro no script de Insert");

                $conex->closeDatabase();

        }

         //Atualizar conteudo do BD
        public function update(Conteudo $conteudo){
            $sql = "update tbl_conteudo set pagina = '".$conteudo->getPagina()."', sessao ='".$conteudo->getSessao()."', conteudo = '".$conteudo->getConteudo()."', img = '".$conteudo->getFoto()."' where idConteudo = ".$conteudo->getIdConteudo();

            $conex = new conexaoMySql();
                $PDO_conex = $conex->conectDatabase();

                if ($PDO_conex->query($sql))
                    echo("Alterado com sucesso");
                else
                    echo("Erro no script de update");

                $conex->closeDatabase();
        }
        //Excluir conteudo do BD
        public function delete($id){

            $sql = "delete from tbl_conteudo where idConteudo =".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                    echo("excluido com sucesso");
            else
                echo("Erro no script de delete");

            $conex->closeDatabase();
        }
        //Listar todos os Conteudos do BD
        public function select($pagina,$section){
            $sql = "select * from tbl_conteudo";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            $listConteudo = null;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe conteudo

                $listConteudo[] =  new Conteudo();
                $listConteudo[$cont]->setIdConteudo($rs['idConteudo']);
                $listConteudo[$cont]->setPagina($rs['pagina']);
                $listConteudo[$cont]->setSessao($rs['sessao']);
                $listConteudo[$cont]->setConteudo($rs['conteudo']);
                $listConteudo[$cont]->setFoto($rs['img']);

                $cont += 1;

            }
            return $listConteudo;
            $conex->closeDatabase();


        }
        //Listar um conteudo do BD
        public function selectById($id){
            $sql = "select * from tbl_conteudo where idConteudo =".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            if ($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $listConteudo =  new Conteudo();

                $listConteudo->setIdConteudo($rs['idConteudo']);
                $listConteudo->setPagina($rs['pagina']);
                $listConteudo->setSessao($rs['sessao']);
                $listConteudo->setConteudo($rs['conteudo']);
                $listConteudo->setFoto($rs['img']);

                return $listConteudo;
            }


        }

    }
?>

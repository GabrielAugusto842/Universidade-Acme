
<?php
/*
    Projeto: Universidade ACME cms
    Autor: Gustavo
    Data: 29/08/2018
    Objetivo: Manipulação do banco de dados na área de usuarios

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/
    class UsuarioDAO{
        public function __construct(){
            require_once('bdClass.php');
        }

         //Inserir novo usuario no BD
        public function insert(Usuario $usuario){
            $sql = "insert into tbl_usuario (nome,usuario,email,senha,foto,idNivel,ativo) values('".$usuario->getNome()."','".$usuario->getUsuario()."','".$usuario->getEmail()."','".$usuario->getSenha()."','".$usuario->getFoto()."',".$usuario->getIdNivel().",".$usuario->getAtivo().")";


                $conex = new conexaoMySql();
                $PDO_conex = $conex->conectDatabase();

                if ($PDO_conex->query($sql))
                    echo("Inserido com sucesso");
                else
                    echo("Erro no script de Insert");

                $conex->closeDatabase();

        }

         //Atualizar usuario do BD
        public function update(Usuario $usuario){
            $sql = "update tbl_usuario set nome = '".$usuario->getNome()."', usuario ='".$usuario->getUsuario()."', email = '".$usuario->getEmail()."', senha = '".$usuario->getSenha()."', foto = '".$usuario->getFoto()."', idNivel = ".$usuario->getIdNivel().", ativo = ".$usuario->getAtivo()." where idUsuario = ".$usuario->getIdUsuario();

            $conex = new conexaoMySql();
                $PDO_conex = $conex->conectDatabase();

                if ($PDO_conex->query($sql))
                    echo("Alterado com sucesso");
                else
                    echo("Erro no script de update");

                $conex->closeDatabase();
        }
        //Excluir usuario do BD
        public function delete($id){
            
            $sql = "delete from tbl_usuario where idUsuario =".$id;
			
            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                    echo("excluido com sucesso");
            else
                echo("Erro no script de delete");

            $conex->closeDatabase();
        }
        //Listar todos os usuarios do BD
        public function selectAll(){
            $sql = "select * from tbl_usuario";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            $listUsuario = null;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe usuario

                $listUsuario[] =  new Usuario();
                $listUsuario[$cont]->setIdUsuario($rs['idUsuario']);
                $listUsuario[$cont]->setNome($rs['nome']);
                $listUsuario[$cont]->setUsuario($rs['usuario']);
                $listUsuario[$cont]->setEmail($rs['email']);
                $listUsuario[$cont]->setSenha($rs['senha']);
                $listUsuario[$cont]->setFoto($rs['foto']);
                $listUsuario[$cont]->setIdNivel($rs['idNivel']);
				$listUsuario[$cont]->setAtivo($rs['ativo']);

                $cont += 1;

            }
            return $listUsuario;
            $conex->closeDatabase();


        }
        //Listar um usuarios do BD
        public function selectById($id){
            $sql = "select * from tbl_usuario where idUsuario =".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            if ($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $listUsuario =  new Usuario();

                $listUsuario->setIdUsuario($rs['idUsuario']);
                $listUsuario->setNome($rs['nome']);
                $listUsuario->setUsuario($rs['usuario']);
                $listUsuario->setEmail($rs['email']);
                $listUsuario->setSenha($rs['senha']);
                $listUsuario->setFoto($rs['foto']);
                $listUsuario->setIdNivel($rs['idNivel']);
				$listUsuario->setAtivo($rs['ativo']);

                return $listUsuario;
            }


        }

        public function login($usuario, $senha){
            @session_start();

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $stmt = $PDO_conex->prepare("SELECT * FROM tbl_usuario WHERE usuario = '".$usuario."' AND senha = '".$senha."' AND ativo = 1");

            // Executando statement
            $stmt->execute();

            // Obter linha consultada
            $obj = $stmt->fetchObject();
			
			 


            // Se a linha existe: indicar que esta logado e encaminhar para outro lugar
            if ($obj) {
				$dados = array("idUsuario" => $obj->idUsuario, "usuario" => $obj->usuario);
            
            	$_SESSION['nivel_usuario'] = $dados;
				
                $_SESSION['usuario'] = $usuario;
				$select = $PDO_conex->query("SELECT * FROM tbl_usuario WHERE usuario = '".$usuario."' AND senha = '".$senha."' AND ativo = 1");

				if ($rs = $select->fetch(PDO::FETCH_ASSOC)){

					$listUsuario =  new Usuario();

					$listUsuario->setFoto($rs['foto']);
					$_SESSION['foto_user'] = $_SESSION['requireUrl'].$listUsuario->getFoto();
					
				}
                
                header('location: index.php');
            } else {
                unset($_SESSION['usuario']);
                unset($_SESSION['foto_user']);
				unset($_SESSION['nivel_usuario']);
            }


        }
		
		//Ativar ou desativar usuario
		public function active($id, $status) {
			if ($status == 1)
				$status = 0;
			else
				$status = 1;

			$sql = "update tbl_usuario set ativo =".$status." where idUsuario =".$id;

			$conex = new conexaoMySql();
			$PDO_conex = $conex->conectDatabase();

			if ($PDO_conex->query($sql))
				echo("Status atualizado com sucesso");
			else
				echo("Erro no script de active");
				echo($sql);

			$conex->closeDatabase();
		}

    }
?>

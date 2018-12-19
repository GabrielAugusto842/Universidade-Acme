<?php


class PaginaDao{
	public function __construct(){
		require_once('bdClass.php');
	}

	public function selectAll(){

		$sql="select * from tbl_pagina order by nome";
        
        $conex = new conexaoMySql();
        $PDO_conex = $conex->conectDatabase();

        $select = $PDO_conex->query($sql);

        $cont = 0;
        $listNivel = null;
        while($rs = $select->fetch(PDO::FETCH_ASSOC)){
			
			$listPaginas[] = new Pagina();
			$listPaginas[$cont]->setIdPagina($rs['idPagina']);
			$listPaginas[$cont]->setNome($rs['nome']);
			
			$cont++;
		}

		return $listPaginas;
        
        $conex->closeDatabase();

	}

} 

?>
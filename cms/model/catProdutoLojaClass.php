<?php
    class CatProdutoLoja{
        private $idCatProduto;
        private $titulo;
        private $desc;
        
    function __construct(){
        require_once("dao/catProdutoLojaDAO.php");
    }
    
    public function getIdCatProduto(){
		return $this->idCatProduto;
	}

	public function setIdCatProduto($idCatProduto){
		$this->idCatProduto = $idCatProduto;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getDesc(){
		return $this->desc;
	}

	public function setDesc($desc){
		$this->desc = $desc;
	}
    }

?>

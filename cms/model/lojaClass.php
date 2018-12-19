<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 27/10/2018
    Objetivo: class de unidade

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

	class ProdutoLoja{

		private $idProduto;
		private $titulo;
		private $desc;
		private $preco;
		private $img;
		private $idCategoria;

		public function __constructor(){
			require_once('dao/lojaDAO.php');

		}

		public function getIdProduto(){
			return $this->idProduto;
		}

		public function setIdProduto($idProduto){
			$this->idProduto = $idProduto;
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

		public function getPreco(){
			return $this->preco;
		}

		public function setPreco($preco){
			$this->preco = $preco;
		}

		public function getImg(){
			return $this->img;
		}

		public function setImg($img){
			$this->img = $img;
		}

		public function getIdCategoria(){
			return $this->idCategoria;
		}

		public function setIdCategoria($idCategoria){
			$this->idCategoria = $idCategoria;
		}

	}

?>

<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 09/10/2018
    Objetivo: class de categoria curso

    Editado por: Gustavo 
    Data  da alteração 16/10/2018
    Conteudo alterado:

*/

class CatCurso{

    private $idCategoriaCurso;
    private $nome;

    public function __construct(){
      require_once('dao/catCursoDAO.php');
    }

    public function getIdCategoriaCurso(){
    	return $this->idCategoriaCurso;
    }

    public function setIdCategoriaCurso($idCategoriaCurso){
      $this->idCategoriaCurso = $idCategoriaCurso;
    }

    public function getNome(){
      return $this->nome;
    }

    public function setNome($nome){
      $this->nome = $nome;
    }


}
?>

<?php
    class controllerCatProdutoLoja{
    public function __construct(){
        @session_start();
        require_once($_SESSION['require']."cms/model/catProdutoLojaClass.php");
        require_once($_SESSION['require']."cms/model/dao/catProdutoLojaDAO.php");
    }
        
    public function inserirCatProdutoLoja(){
       //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

           //Instancia da Classe Usuario da Model
           $catProdutoLojaClass = new CatProdutoLoja();

           //Guarda os dados retirados do FORM nos atributos da classe usuario
           $catProdutoLojaClass->setTitulo($_POST['txtTitulo']);
           $catProdutoLojaClass->setDesc($_POST['txtDesc']);
           
            //instancia de Usuario DAO e chamada do método insert
           $catProdutoLojaDAO = new CatProdutoLojaDAO();
           $catProdutoLojaDAO::Insert($catProdutoLojaClass);

       }
    }
		
	//Atualizar Categoria existente
    public function autualizarCatProdutoLoja($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){

           	//Instancia da Classe Usuario da Model
           $catProdutoLojaClass = new CatProdutoLoja();

           //Guarda os dados retirados do FORM nos atributos da classe usuario
           $catProdutoLojaClass->setIdCatProduto($id);
           $catProdutoLojaClass->setTitulo($_POST['txtTitulo']);
           $catProdutoLojaClass->setDesc($_POST['txtDesc']);
			
           $CatProdutoLojaDAO = new CatProdutoLojaDAO();
           $CatProdutoLojaDAO->update($catProdutoLojaClass);

       }

    }
		
	public function deletarCatProdutoLoja($id){
		
		$CatProdutoLojaDAO = new CatProdutoLojaDAO();
		$CatProdutoLojaDAO->delete($id);
		
	}
		
	 public function buscarCatProdutoLoja($id){
        $CatProdutoLojaDAO = new CatProdutoLojaDAO();
        $listCatProdutoLoja= $CatProdutoLojaDAO->selectById($id);
        //Retorna o resultado obtido para a view
        return $listCatProdutoLoja;
    }
		
        
    public function listarCatProdutoLoja(){
        $CatProdutoLojaDAO = new CatProdutoLojaDAO();
        $listCatProdutoLoja= $CatProdutoLojaDAO->selectAll();

        //Retorna o resultado obtido para a view
        return $listCatProdutoLoja;
    }
        

}
?>
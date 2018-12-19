<?php

@session_start();
if($_SERVER['SERVER_NAME'] == 'www.alcateck.tk'){ // Para rodar no servidor

    //URL traz o caminho correto, pois o padrão MVC dificulta a linkagem de páginas
    $url = "http://".$_SERVER['SERVER_NAME']."/acme/";
	$_SESSION['requireUrl'] = $url;


    //Setando uma variavel de sessao que poderá ser acessada em todos os lugares
    //Caminho dos requires
    $caminho = $_SERVER['DOCUMENT_ROOT']."/acme/";
    $_SESSION['require'] = $caminho;

}else{ //Para rodar local
    //URL traz o caminho correto, pois o padrão MVC dificulta a linkagem de páginas
    $url = "http://".$_SERVER['SERVER_NAME']."/INF4T/alcateck/acme/";
	$_SESSION['requireUrl'] = $url;


    //Setando uma variavel de sessao que poderá ser acessada em todos os lugares
    //Caminho dos requires
    $caminho = $_SERVER['DOCUMENT_ROOT']."/INF4T/alcateck/acme/";
    $_SESSION['require'] = $caminho;

}
?>
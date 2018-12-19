<?php
    include("conexao.php");
    
    $conexao = getDatabaseConnection();
if (!isset($_GET["id"])) {
        $noticias = [];
        $result = $conexao->query("SELECT * FROM tbl_noticia order by idNoticia desc");
        while ($data = $result->fetch_assoc()) {
            $noticias[] = $data;
        }

        echo json_encode($noticias);
        
    } else {
        $statement = $conexao->prepare("SELECT * FROM tbl_noticia WHERE idNoticia = ?");
        $statement->bind_param("i", $_GET["id"]);
        $statement->execute();
        $result = $statement->get_result();
        if ($data = $result->fetch_assoc()) {
            echo json_encode($data);
        }
    }

    $conexao->close();

?>
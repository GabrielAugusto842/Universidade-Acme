<?php
    include("conexao.php");
    
    $conexao = getDatabaseConnection();
if (!isset($_GET["id"])) {
        $eventos = [];
        $result = $conexao->query("SELECT * FROM tbl_evento order by idEvento desc");
        while ($data = $result->fetch_assoc()) {
            $eventos[] = $data;
        }

        echo json_encode($eventos);
        
    } else {
        $statement = $conexao->prepare("SELECT * FROM tbl_evento WHERE idEvento = ?");
        $statement->bind_param("i", $_GET["id"]);
        $statement->execute();
        $result = $statement->get_result();
        if ($data = $result->fetch_assoc()) {
            echo json_encode($data);
        }
    }

    $conexao->close();

?>
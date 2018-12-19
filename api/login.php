<?php
    include("conexao.php");
    
    $conexao = getDatabaseConnection();
        $statement = $conexao->prepare("SELECT * FROM tbl_aluno WHERE matricula = ? and senha = ?");
        $statement->bind_param("ii", $_GET["matricula"], $_GET['senha']);
        $statement->execute();
        $result = $statement->get_result();
        if ($data = $result->fetch_assoc()) {
            echo json_encode($data);
        }

    $conexao->close();
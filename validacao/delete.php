<?php 

 if(isset($_GET['Id']))
{
    include_once('conexao.php');

    $id = $_GET["Id"];

    $sqlSelect = $conexao->prepare("SELECT *  FROM tarefas WHERE Id = ?");
    $sqlSelect->bind_param("i", $Id);
    $sqlSelect->execute();

    $result = $sqlSelect->get_result();

    if($result->num_rows > 0)
    {
        $sqlDelete = $conexao->prepare("DELETE FROM tarefas WHERE id = ?");
        $sqlDelete->bind_param("i", $id);
        $sqlDelete->execute();
        $sqlDelete->close();
    }

    $sqlSelect->close();
    $conexao->close();
}

header('Location: ../pagina/listaTarefa.php');
exit;


?>
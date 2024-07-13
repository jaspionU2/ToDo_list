<?php 

 if(isset($_GET['id']))
{
    include_once('conexao.php');

    $id = $_GET["id"];
    var_dump($id);

    $sqlSelect = $conexao->prepare("SELECT * FROM tarefas WHERE Id = ?");
    $sqlSelect->bind_param("i", $id);
    $sqlSelect->execute();

    $result = $sqlSelect->get_result();

    if($result->num_rows > 0)
    {
        $sqlDelete = $conexao->prepare("DELETE FROM tarefas WHERE Id = ?");
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
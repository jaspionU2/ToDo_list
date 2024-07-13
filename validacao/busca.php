<?php

if (isset($_GET['Buscar_Tarefa'])) {
    include_once('conexao.php');

    $tarefaBuscada = $_GET["Buscar_Tarefa"];
    if (strlen($tarefaBuscada) >= 3 && !empty($tarefaBuscada)) {

        $sqlSearch = $conexao->prepare("SELECT * FROM tarefas WHERE titulo LIKE ?");
        $searchParam = "%$tarefaBuscada%";
        $sqlSearch->bind_param("s", $searchParam);
        $sqlSearch->execute();

        $result = $sqlSearch->get_result();
        $Total_Encontros_Tarefa = $result->num_rows;

        $sqlSearch->close();
    }
    $conexao->close();
} else {
    $tarefaBuscada = '';
}


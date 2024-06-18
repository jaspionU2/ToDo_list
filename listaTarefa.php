<?php

session_start();

include_once "./validacao/funcoesValidacao.php";

// $tarefas = '';


if (VerificaoMetodoPost()) {
  $TituloTarefa = $_POST["Titulo_Tarefa"];
  $DataTarefa = $_POST["Data_Tarefa"];

  if (!isset($_SESSION["Tarefas"])) {
    $_SESSION["Tarefas"] = [];
  }


  $_SESSION["Tarefas"][] = [
    "tarefa" => $TituloTarefa,
    "data" => $DataTarefa
  ];
}

$tarefas = $_SESSION["Tarefas"];

$ListaExcluida = false;

if (isset($_GET['excluir'])) {
  if (isset($_SESSION["Tarefas"][$_GET['excluir']])) {
    unset($_SESSION["Tarefas"][$_GET['excluir']]);
    $_SESSION["Tarefas"] = array_values($_SESSION["Tarefas"]);

    $ListaExcluida = true;
  }
}

?>




<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>

  <style>
    .alerta_excluir {
      width: 10rem;
      left: 50%;
      transform: translate(-50%);
      margin-top: 3rem;
    }

    .tabela_container {
      padding-top: 5rem;
    }

    .titulo_tarefas_cadastrada {
      left: 5.7rem;
    }
  </style>

</head>

<body>

  <div class="container-fluid p-0">

    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <Span class="text-white font fw-semibold me-auto fs-5">ToDo list</Span>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold fs-5" href="index.php">Cadastrar tarefa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white fw-semibold fs-5" aria-current="page" href="listaTarefa.php">listar
              Tarefa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white fw-semibold fs-5" aria-current="page" href="BuscarTarefa.php">Buscar
              Tarefa</a>
          </li>
        </ul>
      </div>
    </nav>

    <?php if ($ListaExcluida) : ?>
      <div class="alerta_excluir alert alert-danger text-center text-dark fw-semibold">Tarefa excluida!</div>
    <?php endif; ?>


    <div class="titulo_tarefas_cadastrada container text-primary text-center w-25 mt-5 position-absolute">
      <h2>Tarefas cadastradas</h2>
    </div>

    <div class="tabela_container container px-3 mt-5">

      <table class="tabela table table-hover">
        <thead class="table-primary">
          <tr>
            <th class="col ">#</th>
            <th scope="col">Tarefa</th>
            <th scope="col">Data</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php if (isset($tarefas) && count($tarefas) > 0) : ?>
            <?php foreach ($tarefas as $chave => $tarefa) : ?>
              <tr class="table-success">
                <th><?php echo $chave + 1; ?></th>
                <td><?php echo  htmlspecialchars($tarefa["tarefa"]); ?></td>
                <td><?php echo  htmlspecialchars($tarefa["data"]); ?></td>
                <td><button type="button" class="btn btn-danger"><a class="link-light link-underline link-underline-opacity-0" href="listaTarefa.php?excluir=<?php echo $chave; ?>">Excluir</a></button></td>
              </tr>

            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>

      </table>

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
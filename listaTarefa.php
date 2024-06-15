<?php

session_start();

include_once "./validacao/funcoesValidacao.php";

$TituloTarefa = '';
$DataTarefa = '';



if(!VerificaoMetodoGet()){
  $TituloTarefa = $_POST["Titulo_Tarefa"];
  $DataTarefa = $_POST["Data_Tarefa"];
}

$_SESSION["Tarefas"][] = 
[
   "tarefa" => $TituloTarefa,
   "data" => $DataTarefa
];


$tarefas = $_SESSION["Tarefas"];
?>




<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
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
        </ul>
      </div>
    </nav>

    <div class="container d-flex px-3">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tarefa</th>
            <th scope="col">Data</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php if (isset($tarefas) && count($tarefas) > 0) : ?>
            <?php foreach ($tarefas as $chave => $tarefa) :?>
            <tr>
              <th><?php echo $chave + 1; ?></th>
              <td><?php echo  htmlspecialchars($tarefa["tarefa"]); ?></td>
              <td><?php echo  htmlspecialchars($tarefa["data"]); ?></td>
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